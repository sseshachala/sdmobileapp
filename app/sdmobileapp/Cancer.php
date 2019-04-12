<?php

namespace App\sdmobileapp;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    /** @lang text */
    protected $table =
        "sd_cancer_table";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ailment_or_disease', 'dictoction_kashayas_juice'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}