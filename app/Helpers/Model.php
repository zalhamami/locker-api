<?php

namespace App\Helpers;

use App\Constants\UserConstant;
use App\Models\Admin;
use App\Models\Guest;
use App\Models\Lecturer;
use App\Models\Student;

class Model
{
    /**
     * @return array
     */
    public static function getAvailableUserModel()
    {
        return [
            UserConstant::USER_GUEST,
            UserConstant::USER_ADMIN,
            UserConstant::USER_LECTURER,
            UserConstant::USER_STUDENT,
        ];
    }

    /**
     * @param string $type
     * @return string|null
     */
    public static function getUserModel(string $type)
    {
        switch ($type) {
            case UserConstant::USER_GUEST:
                return Guest::class;
            case UserConstant::USER_ADMIN:
                return Admin::class;
            case UserConstant::USER_LECTURER:
                return Lecturer::class;
            case UserConstant::USER_STUDENT:
                return Student::class;
            default:
                return null;
        }
    }
}
