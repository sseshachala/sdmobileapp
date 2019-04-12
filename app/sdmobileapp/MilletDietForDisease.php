<?php

namespace App\sdmobileapp;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MilletDietForDisease extends Model
{
    /** @lang text */
    protected $table =
        "sd_millet_diet_diseases_table";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public static function milletDiet() {

        /*
         * SELECT sd_millet_diet_diseases_table.id,sd_disease_table.ailment_or_disease, sd_disease_table.dictoction_kashayas_Juice,
         * sd_millets_table.name, sd_millets_table.millet_type, sd_millets_table.description, concat(sd_millet_diet_diseases_table.number_of_days, " days")
         * as number_of_days FROM `sd_millet_diet_diseases_table`
         * left join sd_millets_table on sd_millet_diet_diseases_table.millet_id=sd_millets_table.id
         * left join sd_disease_table on sd_millet_diet_diseases_table.disease_id = sd_disease_table.id
         */
        //get the diseases
        $diseases = Disease::all();

        $arr =[];
        foreach($diseases as $disease)
        {
            $rows = DB::table('sd_millet_diet_diseases_table')
                ->leftjoin('sd_millets_table', 'sd_millet_diet_diseases_table.millet_id', '=', 'sd_millets_table.id')
                ->leftjoin('sd_disease_table', 'sd_millet_diet_diseases_table.disease_id', '=', 'sd_disease_table.id')
                ->select('sd_millets_table.name',
                    'sd_millet_diet_diseases_table.millet_id', 'sd_millet_diet_diseases_table.number_of_days')
                ->where('sd_millet_diet_diseases_table.disease_id', '=' , $disease->id)
                ->get();

            $obj = new \ stdClass();
            $obj->id  = $disease->id;
            $obj -> disease_name = $disease->ailment_or_disease;
            $obj->dictoction_kashayas_juice=$disease->dictoction_kashayas_juice;
            $obj-> milletProtocol ='';
            foreach($rows as $row)
            {

                $obj-> milletProtocol .= $row->name .'=' . $row-> number_of_days .' days, ';
            }
            $arr[] = $obj;

        }
        return $arr;


    }
}