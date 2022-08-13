<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\ApiController;
use App\Repositories\LockerRepository;
use App\Repositories\LockerTransactionRepository;
use Illuminate\Http\Request;

class LockerController extends ApiController
{
    /**
     * LockerController constructor.
     * @param LockerRepository $repo
     */
    public function __construct(LockerRepository $repo) {
        $this->repo = $repo;
    }

    /**
     * @var LockerTransactionRepository
     */
    private $transactionRepo;

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
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $resp = $this->repo->getById($id);
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
        $resp = $this->repo->update($id, $request->all());
        return $this->singleData($resp);
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
}
