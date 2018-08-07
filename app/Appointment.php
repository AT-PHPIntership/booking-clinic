<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    public const STATUS = ['Pending', 'Confirmed', 'Completed', 'Cancel'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'status', 'clinic_id', 'user_id', 'book_time'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'book_time'];

    /**
     * Get the user book appointment
     *
     *  @return array
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the clinic in appointment
     *
     *  @return array
     */
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    /**
     * Get the get status string.
     *
     * @param string $status status
     *
     * @return string
     */
    public function getStatusAttribute($status)
    {
        return Appointment::STATUS[$status];
    }

    /**
     * Get the examination associated with the appointment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function examination()
    {
        return $this->hasOne(Examination::class);
    }
}
