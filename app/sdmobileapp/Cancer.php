<?php

namespace App\sdmobileapp;

use Illuminate\Database\Eloquent\Model;

class Cancer extends Model
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
        'cancer_type', 'dictoction_kashayas_juice_every_week', 'dictoction_kashayas_juice_afternoon_each_week'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}