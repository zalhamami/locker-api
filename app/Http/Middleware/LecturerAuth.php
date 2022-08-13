<?php

namespace App\Http\Middleware;

use App\Models\Lecturer;
use App\Traits\ApiResponser;
use Closure;
use Illuminate\Http\Request;

class LecturerAuth
{
    use ApiResponser;

    /**
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Lecturer::whereHas('access_token', function ($q) use ($request) {
            $q->where('token', $request->bearerToken());
        })->first();

        if (!$user) {
            return $this->errorResponse('Unauthorized', 401);
        }

        return $next($request);
    }
}
