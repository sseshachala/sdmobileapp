<?php

namespace App\sdmobileapp;

use Illuminate\Database\Eloquent\Model;

class Cancer extends Model
{
    /** @lang text */
    protected $table =
        "sd_app_settings_table";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'url', 'others'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}