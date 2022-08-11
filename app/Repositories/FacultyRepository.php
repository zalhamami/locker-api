<?php

namespace App\Repositories;

use App\Models\Faculty;

class FacultyRepository extends Repository
{
    public function __construct(Faculty $model)
    {
        $this->model = $model;
    }
}
