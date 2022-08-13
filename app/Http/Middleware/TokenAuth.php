<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponser;
use Closure;
use Illuminate\Http\Request;

abstract class TokenAuth
{
    use ApiResponser;

    protected $model;

    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$this->model) {
           return $this->errorResponse('Undefined model', 500);
        }

        $user = $this->model::whereHas('access_token', function ($q) use ($request) {
            $q->where('token', $request->bearerToken());
        })->first();

        if (!$user) {
            return $this->errorResponse('Unauthorized', 401);
        }

        return $next($request);
    }
}
