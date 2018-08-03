<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clinic extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'description', 'clinic_type_id', 'lat', 'lng', 'slug'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the clinic type of the clinic.
     *
     *  @return array
     */
    public function clinicType()
    {
        return $this->belongsTo(ClinicType::class);
    }

    /**
     * Get the images for the clinic type.
     *
     *  @return array
     */
    public function images()
    {
        return $this->hasMany(ClinicImage::class);
    }

    /**
     * Get list appointments of clinic
     *
     *  @return array
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Upload images for clinic.
     *
     *  @param array $images images
     *
     *  @return void
     */
    public function uploadImage($images)
    {
        foreach ($images as $image) {
            $extension = $image->getClientOriginalExtension();
            $file = $image->move('storage/', uniqid('img_') . '.' . $extension);
            $image = new ClinicImage(['path' => $file->getPathname()]);
            $this->images()->save($image);
        }
    }
}
