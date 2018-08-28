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
     * Get the admin associated with the clinic.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    /**
     * Get list appointments of clinic
     *
     *  @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Get list user book appointment of clinic
     *
     *  @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'appointments');
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

    /**
     * Delete images path for clinic
     *
     * @param array $deletedImageId deletedImageId
     *
     * @return void
     */
    public function deleteImage($deletedImageId)
    {
        $this->images()->whereIn('id', $deletedImageId)->delete();
    }

        /**
     * Scope filter for clinic
     *
     * @param \Illuminate\Database\Eloquent\Builder $query query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query)
    {
        $request = request();

        if ($request->has('clinic_type_id')) {
            $query->where('clinic_type_id', $request->clinic_type_id);
        }

        if ($request->has('sort_by')) {
            $column = $request->sort_by;
            $order = $request->has('order') ? $request->order : 'ASC';
            $query->orderBy($column, $order);
        }

        if ($request->has('search')) {
            $keyword = $request->search;
            $query->where('name', 'like', '%'.$keyword.'%')
                ->orWhereHas('clinicType', function ($query) use ($keyword) {
                    $query->where('name', 'like', '%'.$keyword.'%');
                });
        }
    }
}
