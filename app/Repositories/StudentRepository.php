<?php

namespace App\Repositories;

use App\Models\Student;

class StudentRepository extends Repository
{
    public function __construct(Student $model)
    {
        $this->model = $model;
    }
}
