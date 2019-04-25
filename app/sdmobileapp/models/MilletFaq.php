<?php

namespace App\sdmobileapp\models;

use Illuminate\Database\Eloquent\Model;

class MilletFaq extends Model
{
    /** @lang text */
    protected $table =
        "sd_millet_faq";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question', 'question_icon', 'answer', 'answer_icon'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}