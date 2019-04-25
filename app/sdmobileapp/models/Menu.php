<?php

namespace App\sdmobileapp\models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /** @lang text */
    protected $table =
        "sd_dashboard_menu";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'icon', 'menu_name'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

}