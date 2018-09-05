<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Appointment extends Model
{
    use SoftDeletes;
    public const STATUS_PENDING = 0;
    public const STATUS_CONFIRMED = 1;
    public const STATUS_COMPLETED = 2;
    public const STATUS_CANCEL = 3;
    public const STATUS_LABELS = [
        self::STATUS_PENDING => 'Pending',
        self::STATUS_CONFIRMED => 'Confirmed',
        self::STATUS_COMPLETED => 'Completed',
        self::STATUS_CANCEL => 'Cancel'
    ];
    public const COLOR = [
        self::STATUS_PENDING => '#ffc107',
        self::STATUS_CONFIRMED => '#007bff',
        self::STATUS_COMPLETED => '#28a745',
        self::STATUS_CANCEL =>'#dc3545'
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
        return Appointment::STATUS_LABELS[$status];
    }

    /**
     * Get the get status code.
     *
     * @return string
     */
    public function getStatusCodeAttribute()
    {
        return array_search($this->status, Appointment::STATUS_LABELS);
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
     * Filter the appointment.
     *
     * @param mixed $query query
     *
     * @return void
     */
    public function scopeFilter($query)
    {
        $request = request();
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('from') && $request->has('to')) {
            $query->whereBetween('book_time', [$request->from, $request->to]);
        }

        if ($request->has('clinic_id')) {
            $query->where('clinic_id', $request->clinic_id);
        }

        if ($request->has('sort_by')) {
            $column = $request->sort_by;
            $order = $request->has('order') ? $request->order : 'ASC';
            $query->orderBy($column, $order);
        }

        if ($request->has('search')) {
            $keyword = request()->search;
            $query->whereHas('user', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%%');
            });
        }
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

    /**
     * Check status is pending.
     *
     * @return boolean
     */
    public function isPending()
    {
        return $this->status == self::STATUS_LABELS[self::STATUS_PENDING];
    }

    /**
     * Check status is confirmed.
     *
     * @return boolean
     */
    public function isConfirmed()
    {
        return $this->status == self::STATUS_LABELS[self::STATUS_CONFIRMED];
    }

    /**
     * Check status is completed.
     *
     * @return boolean
     */
    public function isCompleted()
    {
        return $this->status == self::STATUS_LABELS[self::STATUS_COMPLETED];
    }

    /**
     * Check status is cancel.
     *
     * @return boolean
     */
    public function isCancel()
    {
        return $this->status == self::STATUS_LABELS[self::STATUS_CANCEL];
    }
}
