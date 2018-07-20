<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admins';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
}
