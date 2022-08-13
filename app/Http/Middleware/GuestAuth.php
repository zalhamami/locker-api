<?php

namespace App\Http\Middleware;

use App\Models\Guest;
use App\Traits\ApiResponser;
use Closure;
use Illuminate\Http\Request;

class GuestAuth
{
    use ApiResponser;

    /**
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Guest::whereHas('access_token', function ($q) use ($request) {
            $q->where('token', $request->bearerToken());
        })->first();

        if (!$user) {
            return $this->errorResponse('Unauthorized', 401);
        }

        return $next($request);
    }
}