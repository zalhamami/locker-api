<?php

namespace App\Repositories;

use App\Models\Locker;

class LockerRepository extends Repository
{
    public function __construct(Locker $model)
    {
        $this->model = $model;
    }
}
