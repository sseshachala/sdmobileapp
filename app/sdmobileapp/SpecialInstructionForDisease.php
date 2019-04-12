<?php

namespace App\sdmobileapp;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SpecialInstructionForDisease extends Model
{
    /** @lang text */
    protected $table =
        "sd_disease_special_instructions_table";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'instruction',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public static function getInstructions($diseaseId)
    {
        $rows = DB::table('sd_disease_special_instructions_table')->select('id', 'instruction')->where('disease_id', '=', $diseaseId)->get();
        $stringBuffer = '';
        foreach($rows as $row) {
            $stringBuffer.= $row->id .' : ' . $row->instruction .' \n';
        }
        return $stringBuffer;
    }
}