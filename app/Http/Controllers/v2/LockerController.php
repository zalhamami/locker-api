<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\ApiController;
use App\Repositories\LockerRepository;
use Illuminate\Http\Request;

class LockerController extends ApiController
{
    /**
     * MajorController constructor.
     * @param LockerRepository $repo
     */
    public function __construct(LockerRepository $repo) {
        $this->repo = $repo;
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

        $data = $request->all();
        $data['code'] =
        $locker = $this->repo->create($request->all());
        $locker->code = md5($locker->id);
        $locker->save();

        return $this->singleData($locker);
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
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(int $id)
    {
        $resp = $this->repo->delete($id);
        return $this->deleteMessage($resp);
    }
}
