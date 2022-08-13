<?php

namespace App\Http\Middleware;

use App\Models\Guest;
use Closure;
use Illuminate\Http\Request;

class GuestAuth extends TokenAuth
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $this->setModel(Guest::class);
        return parent::handle($request, $next);
    }
}
