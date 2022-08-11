<?php

namespace App\Repositories;

use App\Models\lecturer;

class LecturerRepository extends Repository
{
    public function __construct(lecturer $model)
    {
        $this->model = $model;
    }
}
