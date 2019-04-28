<?php

namespace App\sdmobileapp\models;

use Illuminate\Database\Eloquent\Model;

class MilletAvailabilityLocation extends Model
{
    /** @lang text */
    protected $table =
        "sd_millet_availability_locations";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'profile_type'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}