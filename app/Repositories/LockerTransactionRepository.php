<?php

namespace App\Repositories;

use App\Models\LockerTransaction;

class LockerTransactionRepository extends Repository
{
    public function __construct(LockerTransaction $model)
    {
        $this->model = $model;
    }
}
