<?php

namespace App\sdmobileapp\models;


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

        return MilletDietForDisease::getMilletDietForDisease($diseases);

  }

   public static function filter($searchTerm) {

        $reserved = array("*", ".", "+", "-");


        if (in_array($searchTerm, $reserved)) {
            return MilletDietForDisease::milletDiet();
        }

        $diseases = Disease::selectRaw("*, MATCH(ailment_or_disease, dictoction_kashayas_juice, tags) AGAINST('$searchTerm' IN BOOLEAN MODE) as relScore")
            ->whereRaw("MATCH(ailment_or_disease, dictoction_kashayas_juice, tags) AGAINST('$searchTerm' IN NATURAL LANGUAGE MODE)", MilletDietForDisease::fullTextWildcards($searchTerm))
            ->orderBy('relScore')
            ->get();


        return MilletDietForDisease::getMilletDietForDisease($diseases);
    }


    private static function getMilletDietForDisease($diseases)
    {
        $arr =[];
        foreach($diseases as $disease)
        {
            $rows = DB::table('sd_millet_diet_diseases_table')
                ->leftjoin('sd_millets_table', 'sd_millet_diet_diseases_table.millet_id', '=', 'sd_millets_table.id')
                ->leftjoin('sd_disease_table', 'sd_millet_diet_diseases_table.disease_id', '=', 'sd_disease_table.id')
                ->select('sd_millets_table.name','sd_disease_table.tags',
                    'sd_millet_diet_diseases_table.millet_id', 'sd_millet_diet_diseases_table.number_of_days')
                ->where('sd_millet_diet_diseases_table.disease_id', '=' , $disease->id)
                ->get();

            //id  , Description, array of videos, Type of Ailment or,  Dictoction/Kashayam Diet, Millet Diet, Keywords

            $obj = new \ stdClass();
            $obj->id  = $disease->id;
            $obj -> Type_of_Ailment = $disease->ailment_or_disease;
            $obj->Dictoction_Kashayam_Diet=$disease->dictoction_kashayas_juice.'<br><br><strong>Tags</strong><br>'.$disease->tags;
            $obj->Tags_Keywords = $disease->tags;
            $obj-> MilletProtocol ='<ul>';
            foreach($rows as $row)
            {

                $obj-> milletProtocol .= '<li>'.$row->name .'=' . $row-> number_of_days .' days </li>';
            }
            $obj-> MilletProtocol .='</ul>';
            $instrs = SpecialInstructionForDisease::getInstructions($disease->id);
            if(!empty($instrs))
                $obj->specialInstruction = '<b> * '.$instrs.'</b>';

            $arr[] = $obj;

        }
        return $arr;
    }

    private static function fullTextWildcards($term)
    {
        // removing symbols used by MySQL
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $term = str_replace($reservedSymbols, '', $term);

        $words = explode(' ', $term);

        foreach($words as $key => $word) {
            /*
             * applying + operator (required word) only big words
             * because smaller ones are not indexed by mysql
             */
            if(strlen($word) >= 3) {
                $words[$key] = '+' . $word . '*';
            }
        }

        $searchTerm = implode( ' ', $words);

        return $searchTerm;
    }
}