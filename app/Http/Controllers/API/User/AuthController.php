<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\User\UserRegisterRequest;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Requests\User\UserChangePassRequest;
use App\Http\Controllers\API\User\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\User;

class AuthController extends BaseController
{
    /**
     * User register
     *
     * @param \Illuminate\Http\Requests\User\UserRegisterRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(UserRegisterRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        if (User::create($data)) {
            return $this->successResponse(User::latest()->first(), Response::HTTP_CREATED);
        }
        return $this->errorResponse(__('api/user.login.fail'), Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Login user and create token
     *
     * @param \Illuminate\Http\Requests\User\UserLoginRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(UserLoginRequest $request)
    {
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return $this->errorResponse(__('api/user.login.fail'), Response::HTTP_UNAUTHORIZED);
        }
        $user = $request->user();
        $tokenResult = $user->createToken(config('define.access_token'));
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return $this->successResponse([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ], Response::HTTP_OK);
    }

    /**
     * Logout user
     *
     * @param \Illuminate\Http\Requests $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return $this->successResponse(__('api/user.log_out'), Response::HTTP_OK);
    }

    /**
     * Change password user
     *
     * @param \Illuminate\Http\Requests\User\UserChangePassRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword(UserChangePassRequest $request)
    {
        $user = $request->user();
        $user->password = Hash::make($request->new_password);
        if ($user->save()) {
            return $this->successResponse(__('api/user.change_password.success'), Response::HTTP_OK);
        }
        return $this->errorResponse(__('api/user.change_password.fail'), Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
