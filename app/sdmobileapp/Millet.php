<?php

namespace App\sdmobileapp;

use Illuminate\Database\Eloquent\Model;

class Millet extends Model
{
    /** @lang text */
    protected $table =
        "sd_millets_table";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'scientific_name', 'alternative_names', 'millet_type', 'description', 'uses', 'nutrition'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}