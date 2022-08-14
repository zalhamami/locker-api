<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\ApiController;
use App\Repositories\FacultyRepository;
use Illuminate\Http\Request;

class FacultyController extends ApiController
{
    /**
     * MajorController constructor.
     * @param FacultyRepository $repo
     */
    public function __construct(FacultyRepository $repo) {
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
        $resp = $this->repo->create($request->all());
        return $this->singleData($resp);
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
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showMajors(int $id)
    {
        $faculty = $this->repo->getById($id);
        $data = $this->repo->getAll($faculty->majors());
        return $this->collectionData($data);
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
