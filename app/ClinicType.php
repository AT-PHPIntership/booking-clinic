<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the clnics for the clinic type.
     *
     *  @return array
     */
    public function clinics()
    {
        return $this->hasMany('App\Clinic');
    }
}
