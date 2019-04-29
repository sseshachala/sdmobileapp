<?php

namespace App\sdmobileapp\models;

use Illuminate\Database\Eloquent\Model;

class GenericData extends Model
{
    /** @lang text */
    protected $table =
        "sd_generic_data";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}