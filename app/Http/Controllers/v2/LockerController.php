<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\ApiController;
use App\Models\Locker;
use App\Repositories\LockerRepository;
use App\Repositories\LockerTransactionRepository;
use App\Services\QrCodeService;
use Illuminate\Http\Request;

class LockerController extends ApiController
{
    /**
     * @var LockerTransactionRepository
     */
    private $transactionRepo;

    /**
     * LockerController constructor.
     * @param LockerRepository $repo
     * @param LockerTransactionRepository $transactionRepo
     */
    public function __construct(LockerRepository $repo, LockerTransactionRepository $transactionRepo) {
        $this->repo = $repo;
        $this->transactionRepo = $transactionRepo;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $resp = $this->repo->getAll();
        return $this->collectionData($resp);
    }

    /**
     * @param Request $request
     */
    private function validateRequest(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $locker = $this->repo->create($request->all());
        $locker->code = md5($locker->id);
        $locker->save();

        // Generate qr code
        $this->generateQrCode($locker);

        return $this->singleData($locker);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeTransaction(Request $request, int $id)
    {
        $request->validate([
            'status' => ['required', 'in:open,close'],
        ]);

        $locker = $this->repo->getById($id);

        // Add locker transaction
        $user = session('user');
        $transaction = $user->locker_transactions()->create([
            'locker_id' => $locker->id,
            'status' => $request['status']
        ]);

        // Save locker status
        $locker->status = $transaction->status;
        $locker->save();

        return $this->singleData($transaction);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function showTransactions(Request $request)
    {
        $request->validate([
            'locker_id' => ['nullable', 'integer', 'exists:lockers,id']
        ]);

        if ($request['locker_id']) {
            $transactions = $this->transactionRepo->getAllByField('locker_id', $request['locker_id']);
            return $this->collectionData($transactions);
        }

        $transactions = $this->transactionRepo->getAll();
        return $this->collectionData($transactions);
    }

    /**
     * @param string $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $code)
    {
        $resp = $this->repo->getByField('code', $code);
        return $this->singleData($resp);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $this->validateRequest($request);
        $locker = $this->repo->update($id, $request->all());

        // Generate qr code if doesn't exists
        if (!$locker->qr_url) {
            $this->generateQrCode($locker);
        }

        return $this->singleData($locker);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(Request $request, int $id)
    {
        $request->validate([
            'status' => ['required', 'in:open,close']
        ]);

        $locker = $this->repo->getById($id);
        $locker->status = $request['status'];
        $locker->save();

        return $this->singleData($locker);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(int $id)
    {
        $resp = $this->repo->delete($id);
        return $this->deleteMessage($resp);
    }

    /**
     * @param Locker $locker
     */
    private function generateQrCode(Locker $locker)
    {
        $uploadPath = 'lockers/';
        $qrData = ['code' => $locker->code];

        $service = new QrCodeService();
        $qrCode = $service->generate(json_encode($qrData))->upload($uploadPath);

        if ($qrCode) {
            $locker->qr_url = $qrCode['url'];
            $locker->save();
        }
    }
}
