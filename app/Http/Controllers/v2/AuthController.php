<?php

namespace App\Http\Controllers\v2;

use App\Constants\UserConstant;
use App\Helpers\Model;
use App\Http\Controllers\ApiController;
use App\Models\Admin;
use App\Models\Guest;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AuthController extends ApiController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validateUserType($request);

        $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string', 'confirmed'],
            'identification_number' => ['nullable', 'string'],
            'institution' => ['nullable', 'string'],
            'major_id' => ['nullable', 'integer', 'exists:majors,id']
        ]);

        // validate email based on users type
        $request->validate([
            'email' => ['required', 'email', "unique:{$request['type']}s"],
        ]);

        // Hash password
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        // Create user based on type
        $model = Model::getUserModel($request['type']);
        $user = $model::create($data);

        // Create access token
        $user = $this->createAccessToken($user);

        return $this->singleData($user);
    }

    /**
     * @param $user
     * @return mixed
     */
    private function createAccessToken($user) {
        $user->access_token()->create([
            'token' => Str::random(50),
        ]);
        $user->refresh();

        return $user;
    }

    /**
     * @param Request $request
     */
    private function validateUserType(Request $request)
    {
        $request->validate([
            'type' => Rule::in([
                UserConstant::USER_ADMIN,
                UserConstant::USER_GUEST,
                UserConstant::USER_LECTURER,
                UserConstant::USER_STUDENT
            ])
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validateUserType($request);

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $auth = Auth::guard($request['type']);

        $credentials = $request->only(['email', 'password']);
        if (!$auth->attempt($credentials)) {
            return $this->errorResponse('Invalid credentials', 400);
        }

        $user = $auth->user();
        if (!$user->access_token) {
            $user = $this->createAccessToken($user);
        }

        return $this->singleData([
            'access_token' => $user->access_token->token,
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function showUser()
    {
        return $this->singleData(session('user'));
    }
}
