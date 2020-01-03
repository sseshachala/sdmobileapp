<?php

namespace App\sdmobileapp\models;

use Illuminate\Database\Eloquent\Model;

class UserDevice extends Model
{
    /** @lang text */
    protected $table =
        "sd_user_devices";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'device_token'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}