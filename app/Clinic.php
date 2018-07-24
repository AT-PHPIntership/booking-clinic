<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clinics';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'description', 'clinic_type'
    ];

    /**
     * Get the clinic type of the clinic.
     *
     *  @return array
     */
    public function clinicType()
    {
        return $this->belongsTo('App\ClinicType', 'clinic_type_id', 'id');
    }
}
