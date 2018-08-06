<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    public const CLINIC_ADMIN = 0;
    public const SUPER_ADMIN = 1;

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
    protected $fillable = ['name', 'email', 'password', 'clinic_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the clinic that owns the admin.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    /**
     * Return true if user is super admin
     *
     * @return boolean
     */
    public function isSuperAdmin()
    {
        return $this->role == self::SUPER_ADMIN;
    }

    /**
     * Return true if user is clinic admin
     *
     * @return boolean
     */
    public function isClinicAdmin()
    {
        return $this->role == self::CLINIC_ADMIN;
    }
}
