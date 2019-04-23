<?php

namespace App\sdmobileapp;

use Illuminate\Database\Eloquent\Model;

class AppProfileType extends Model
{
    /** @lang text */
    protected $table =
        "sd_app_profile_template_table";

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