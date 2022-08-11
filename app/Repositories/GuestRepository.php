<?php

namespace App\Repositories;

use App\Models\Guest;

class GuestRepository extends Repository
{
    public function __construct(Guest $model)
    {
        $this->model = $model;
    }
}
