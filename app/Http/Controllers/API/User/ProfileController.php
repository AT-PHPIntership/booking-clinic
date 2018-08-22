<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\API\User\BaseController;
use App\Http\Requests\User\UserUpdateProfileRequest;
use App\User;

class ProfileController extends BaseController
{
    /**
     * Update user profile
     *
     * @param \Illuminate\Http\Requests\User\\Illuminate\Http\Requests\User\UserUpdateProfileRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateProfileRequest $request)
    {
        $user = $request->user();
        if ($user->update($request->except(['email', 'password']))) {
            return $this->successResponse($user, Response::HTTP_OK);
        }
        return $this->errorResponse(__('api/user.update.fail'), Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
