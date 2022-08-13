<?php

namespace App\Http\Middleware;

use App\Helpers\Model;
use App\Traits\ApiResponser;
use Closure;
use Illuminate\Http\Request;

class TokenAuth
{
    use ApiResponser;

    /**
     * @param Request $request
     * @param Closure $next
     * @param string|null $model
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle(Request $request, Closure $next, string $model = null)
    {
        if (!$model) {
            $model = Model::getAvailableUserModel();
        } else {
            $model = explode('|', $model);
        }

        $user = null;
        foreach ($model as $modelItem) {
            if (!in_array($modelItem, Model::getAvailableUserModel())) {
                return $this->errorResponse('Invalid user model', 500);
            }

            $userModel = Model::getUserModel($modelItem);

            $userExists = $userModel::whereHas('access_token', function ($q) use ($request) {
                $q->where('token', $request->bearerToken());
            })->first();

            if ($userExists) {
                $user = $userExists;
            }
        }

        if (!$user) {
            return $this->errorResponse('Unauthorized', 401);
        }

        // Save user data in session
        session(['user' => $user]);

        return $next($request);
    }
}
