<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->gender = $user->gender === User::GENDER_MALE
            ? __('admin/user.fields.gender_type.male')
            : __('admin/user.fields.gender_type.female');
        return view('admin.users.show', compact('user'));
    }
}
