<?php

namespace App\Repositories;

use App\Models\Major;

class MajorRepository extends Repository
{
    public function __construct(Major $model)
    {
        $this->model = $model;
    }
}
