<?php
namespace App\sdmobileapp\models;

use Illuminate\Database\Eloquent\Model;

class KashayaLeaves extends Model
{
    /** @lang text */
    protected $table =
        "sd_kashaya_leaves";

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