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

    public static function milletDietByType($type) {

        /*
         * SELECT sd_millet_diet_diseases_table.id,sd_disease_table.ailment_or_disease, sd_disease_table.dictoction_kashayas_Juice,
         * sd_millets_table.name, sd_millets_table.millet_type, sd_millets_table.description, concat(sd_millet_diet_diseases_table.number_of_days, " days")
         * as number_of_days FROM `sd_millet_diet_diseases_table`
         * left join sd_millets_table on sd_millet_diet_diseases_table.millet_id=sd_millets_table.id
         * left join sd_disease_table on sd_millet_diet_diseases_table.disease_id = sd_disease_table.id
         */
        //get the diseases
        //Get
        $diseases = [];
        if(empty($type))
        {
            $diseases = Disease::all();

        }
        else
        {
            $diseases = Disease::where('type', '=', $type)->get();
        }



        return MilletDietForDisease::getMilletDietForDisease($diseases);

  }

   public static function filter($searchTerm) {

        $reserved = array("*", ".", "+", "-");


        if (in_array($searchTerm, $reserved)) {
            return MilletDietForDisease::milletDietByType('');
        }


       $diseases = DB::table('sd_disease_table')->selectRaw("sd_disease_table.id, sd_disease_table.ailment_or_disease, sd_disease_table.tags")
           ->selectRaw("sd_disease_table.dictoction_kashayas_juice, sd_disease_table.dictoction_kashayas_juice_every_week")
           ->selectRaw("concat_ws('=',sd_millets_table.name, concat(sd_millet_diet_diseases_table.number_of_days, ' days')) as milletProtocol")
           ->selectRaw("sd_millets_table.millet_type,sd_millets_table.nutrition,sd_millets_table.description, sd_millets_table.scientific_name, sd_millets_table.uses")
           ->selectRaw("MATCH(ailment_or_disease, dictoction_kashayas_juice, tags) AGAINST('$searchTerm' IN NATURAL LANGUAGE MODE) as diseaseRelScore")
           ->selectRaw("MATCH(sd_millets_table.name,sd_millets_table.description,sd_millets_table.alternative_names,sd_millets_table.uses,sd_millets_table.nutrition) AGAINST('$searchTerm' IN NATURAL LANGUAGE MODE) as milletRelScore")
           ->leftJoin('sd_millet_diet_diseases_table', 'sd_disease_table.id', '=', 'sd_millet_diet_diseases_table.disease_id')
           ->leftJoin('sd_millets_table', 'sd_millet_diet_diseases_table.millet_Id', '=', 'sd_millets_table.id')
           ->whereRaw("MATCH(ailment_or_disease, dictoction_kashayas_juice, tags) AGAINST('$searchTerm' IN NATURAL LANGUAGE MODE)", MilletDietForDisease::fullTextWildcards($searchTerm))
           ->orWhereRaw("MATCH(sd_millets_table.name,sd_millets_table.description,sd_millets_table.alternative_names,sd_millets_table.uses,sd_millets_table.nutrition) AGAINST('$searchTerm' IN NATURAL LANGUAGE MODE)", MilletDietForDisease::fullTextWildcards($searchTerm))
           ->orWhereRaw("sd_disease_table.ailment_or_disease like '%$searchTerm%'")
           ->orWhereRaw("sd_disease_table.dictoction_kashayas_juice like '%$searchTerm%'")
           ->orWhereRaw("sd_disease_table.tags like '%$searchTerm%'")
           ->get();

       $arr =[];
       // print_r($cancers); die();
       foreach($diseases as $disease) {

           $obj = new \ stdClass();
           $obj->id  = $disease->id;

           $obj -> Type_of_Ailment = $disease->ailment_or_disease;
           $obj->Dictoction_Kashayam_Diet = $disease->dictoction_kashayas_juice . '<br>'. $disease->dictoction_kashayas_juice_every_week;

           $obj->Tags_Keywords = $disease->tags;
           //$obj->description= $cancer->description;
           $obj->milletProtocol = $disease->milletProtocol;
           $arr[] = $obj;

       }
       return $arr;;

        return MilletDietForDisease::getMilletDietForDisease($diseases);
    }


    private static function getMilletDietForDisease($diseases)
    {
        $arr =[];
        foreach($diseases as $disease)
        {

            $rows = DB::table('sd_millet_diet_diseases_table')
                ->selectRaw("concat_ws('=',sd_millets_table.name, concat(sd_millet_diet_diseases_table.number_of_days, ' days')) as milletProtocol")
                ->selectRaw("sd_millets_table.millet_type,sd_millets_table.nutrition,sd_millets_table.description, sd_millets_table.scientific_name, sd_millets_table.uses")
                //->selectRaw('sd_millets_table.name','sd_millet_diet_diseases_table.millet_id')
                ->leftjoin('sd_millets_table', 'sd_millet_diet_diseases_table.millet_id', '=', 'sd_millets_table.id')

                ->where('sd_millet_diet_diseases_table.disease_id', '=' , $disease->id)
                ->get();

            $obj = new \ stdClass();
            $obj->id  = $disease->id;
            $obj -> Type_of_Ailment = $disease->ailment_or_disease;
            $obj->Dictoction_Kashayam_Diet=$disease->dictoction_kashayas_juice;
            $obj->Tags_Keywords = $disease->tags;
            $obj-> milletProtocol ='<ul>';
            foreach($rows as $row)
            {
                 $obj-> milletProtocol .= '<li>'.$row->milletProtocol.' days </li>';
            }
            $obj-> milletProtocol .='</ul>';
            $instrs = SpecialInstructionForDisease::getInstructions($disease->id);
            if(!empty($instrs))
                $obj->description = '<b> * '.$instrs.'</b>';

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