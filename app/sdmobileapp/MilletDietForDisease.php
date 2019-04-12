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
        return DB::table('sd_millet_diet_diseases_table')
            ->leftjoin('sd_millets_table', 'sd_millet_diet_diseases_table.millet_id', '=', 'sd_millets_table.id')
            ->leftjoin('sd_disease_table', 'sd_millet_diet_diseases_table.disease_id', '=', 'sd_disease_table.id')
            ->select('sd_millet_diet_diseases_table.id','sd_disease_table.ailment_or_disease', 'sd_disease_table.dictoction_kashayas_juice',
                     'sd_millets_table.name', 'sd_millets_table.millet_type', 'sd_millets_table.description','sd_millet_diet_diseases_table.number_of_days')
            ->paginate(15);
    }
}