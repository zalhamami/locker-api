<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'APIFinish',
        'APICheck',
        'APIHistoryl1',
        'APIOpen',
        'APIClose',
        'APIPresensi',
        'APIRegister1',
        'APIRegister2',
        'APIRegister',
        'APIAllLoker',
        'APILogin'
        //
    ];
}
