<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    public const GENDER_FEMALE = 0;
    public const GENDER_MALE = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'dob', 'phone', 'address', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the user's gender string.
     *
     * @return string
     */
    public function getGenderStringAttribute()
    {
        return $this->gender === User::GENDER_MALE
            ? __('admin/user.fields.gender_type.male')
            : __('admin/user.fields.gender_type.female');
    }
    /**
     * Get list appointments of user
     *
     *  @return array
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

            /**
     * Scope filter for user
     *
     * @param \Illuminate\Database\Eloquent\Builder $query query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query)
    {
        $request = request();
        if ($request->has('sort_by')) {
            $column = $request->sort_by;
            $order = $request->has('order') ? $request->order : 'ASC';
            $query->orderBy($column, $order);
        }
        if ($request->has('gender')) {
            $query->where('gender', $request->gender);
        }
        if ($request->has('search')) {
            $keyword = $request->search;
            $query->where('name', 'like', '%'.$keyword.'%')
                ->orWhere('email', 'like', '%'.$keyword.'%');
        }
    }
}
