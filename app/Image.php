<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['path', 'clinic_id'];

    /**
     * Get the clinic of image.
     *
     *  @return array
     */
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
