<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    public const STATUS = [
        'Pending' => 0,
        'Confirmed' => 1,
        'Completed' => 2,
        'Cancel' => 3
    ];
    public const COLOR = [
        'Pending' => '#ffc107',
        'Confirmed' => '#007bff',
        'Success' => '#28a745',
        'Cancel' =>'#dc3545'
    ];

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
        return array_search($status, Appointment::STATUS);
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

    /**
     * Get list appointments not pending
     *
     * @param \Illuminate\Database\Eloquent\Builder $query query
     * @param mixed $status status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotPending($query)
    {
        return $query->where('status', '<>', self::STATUS['Pending']);
    }

    /**
     * Scope a query to group appointments by status .
     *
     * @param \Illuminate\Database\Eloquent\Builder $query query

     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', self::STATUS[$status]);
    }

    /**
     * Scope a query to check appointmentStatus.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query query

     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function isStatus($status)
    {
        return $this->status == $status;
    }

}
