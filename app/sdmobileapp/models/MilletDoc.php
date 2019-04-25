<?php

namespace App\sdmobileapp\models;
use Illuminate\Database\Eloquent\Model;

class MilletDoc extends Model
{
    /** @lang text */
    protected $table =
        "sd_doc_details";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'about', 'image'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}