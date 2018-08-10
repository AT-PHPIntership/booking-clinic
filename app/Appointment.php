<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;
    public const STATUS = ['Pending', 'Confirmed', 'Completed', 'Cancel' ];
    public const COLOR = [
        'Pending' => '#ffc107',
        'Confirmed' => '#007bff',
        'Completed' => '#28a745',
        'Cancel' =>'#dc3545'
    ];
    public const STATUS_PENDING = 0;
    public const STATUS_CONFIRMED = 1;
    public const STATUS_COMPLETED = 2;
    public const STATUS_CANCEL = 3;

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
     * Get the get status code.
     *
     * @return string
     */
    public function getStatusCodeAttribute()
    {
        return array_search($this->status, Appointment::STATUS);
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
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotPending($query)
    {
        return $query->where('status', '<>', self::STATUS_PENDING);
    }

     /**
     * Scope a query to group appointments by status .
     *
     * @param \Illuminate\Database\Eloquent\Builder $query  query
     * @param mixed                                 $status status
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
