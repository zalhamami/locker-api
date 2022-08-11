<?php

namespace App\Repositories;

use App\Models\LoginHistory;

class LoginHistoryRepository extends Repository
{
    public function __construct(LoginHistory $model)
    {
        $this->model = $model;
    }
}
