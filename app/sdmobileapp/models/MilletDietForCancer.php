<?php

namespace App\sdmobileapp\models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MilletDietForCancer extends Model
{
    /** @lang text */
    protected $table =
        "sd_millet_diet_cancer_table";

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
         *
         * Select sd_millet_diet_cancer_table.id,sd_cancer_table.cancer_type, sd_cancer_table.dictoction_kashayas_juice_afternoon_each_week,
         * sd_cancer_table.dictoction_kashayas_juice_every_week, sd_millets_table.name, sd_millets_table.millet_type, sd_millets_table.description,sd_millet_diet_cancer_table.number_of_days From sd_millet_diet_cancer_table left join sd_millets_table on sd_millet_diet_cancer_table.millet_id=sd_millets_table.id left join sd_cancer_table on sd_millet_diet_cancer_table.cancer_type_id = sd_cancer_table.id\
         *
         */
        $cancers = Cancer::all();
        return MilletDietForCancer::getMilletDietForCancer($cancers);
    }

    public static function filter($searchTerm) {

        $reserved = array("*", ".", "+", "-");


        if (in_array($searchTerm, $reserved)) {
           return MilletDietForCancer::milletDiet();
        }

        $cancers = DB::table('sd_cancer_table')->selectRaw("sd_cancer_table.id, sd_cancer_table.cancer_type, sd_cancer_table.tags")
                                               ->selectRaw("sd_cancer_table.dictoction_kashayas_juice_afternoon_each_week")
            ->selectRaw("sd_cancer_table.dictoction_kashayas_juice_every_week, concat_ws('=',sd_millets_table.name, concat(sd_millet_diet_cancer_table.number_of_days, ' days')) as milletProtocol")
            ->selectRaw("sd_millets_table.millet_type,sd_millets_table.nutrition,sd_millets_table.description, sd_millets_table.scientific_name, sd_millets_table.uses")
            ->selectRaw("MATCH(cancer_type, dictoction_kashayas_juice_every_week, dictoction_kashayas_juice_afternoon_each_week, tags) AGAINST('$searchTerm' IN NATURAL LANGUAGE MODE) as diseaseRelScore")
            ->selectRaw("MATCH(sd_millets_table.name,sd_millets_table.description,sd_millets_table.alternative_names,sd_millets_table.uses,sd_millets_table.nutrition) AGAINST('$searchTerm' IN NATURAL LANGUAGE MODE) as milletRelScore")
            ->leftJoin('sd_millet_diet_cancer_table', 'sd_cancer_table.id', '=', 'sd_millet_diet_cancer_table.cancer_type_id')
            ->leftJoin('sd_millets_table', 'sd_millet_diet_cancer_table.millet_Id', '=', 'sd_millets_table.id')
            ->whereRaw("MATCH(cancer_type, dictoction_kashayas_juice_every_week, dictoction_kashayas_juice_afternoon_each_week, tags) AGAINST('$searchTerm' IN NATURAL LANGUAGE MODE)", MilletDietForCancer::fullTextWildcards($searchTerm))
            ->orWhereRaw("MATCH(sd_millets_table.name,sd_millets_table.description,sd_millets_table.alternative_names,sd_millets_table.uses,sd_millets_table.nutrition) AGAINST('$searchTerm' IN NATURAL LANGUAGE MODE)", MilletDietForCancer::fullTextWildcards($searchTerm))
            ->orWhereRaw("MATCH(sd_millets_table.name,sd_millets_table.description,sd_millets_table.alternative_names,sd_millets_table.uses,sd_millets_table.nutrition) AGAINST('$searchTerm' IN NATURAL LANGUAGE MODE)", MilletDietForDisease::fullTextWildcards($searchTerm))
            ->orWhereRaw("sd_cancer_table.cancer_type like '%$searchTerm%'")
            ->orWhereRaw("sd_cancer_table.dictoction_kashayas_juice_afternoon_each_week like '%$searchTerm%'")
            ->orWhereRaw("sd_cancer_table.dictoction_kashayas_juice_every_week like '%$searchTerm%'")
            ->orWhereRaw("sd_cancer_table.tags like '%$searchTerm%'")
            ->get();

        $arr =[];
        // print_r($cancers); die();
        foreach($cancers as $cancer) {

            $obj = new \ stdClass();
            $obj->id  = $cancer->id;

            $obj -> Type_of_Ailment = $cancer->cancer_type;
            $obj->Dictoction_Kashayam_Diet = $cancer->dictoction_kashayas_juice_every_week . '<br>'. $cancer->dictoction_kashayas_juice_afternoon_each_week;
            $obj->Tags_Keywords = $cancer->tags;
            //$obj->description= $cancer->description;
            $obj->milletProtocol = $cancer->milletProtocol;

            $arr[] = $obj;

        }
        return $arr;;
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

    private static function getMilletDietForCancer($cancers)
    {
        $arr =[];
         // print_r($cancers); die();
        foreach($cancers as $cancer) {

            $obj = new \ stdClass();
            $obj->id  = $cancer->id;

            $rows = DB::table('sd_millet_diet_cancer_table')
                ->selectRaw("concat_ws('=',sd_millets_table.name, concat(sd_millet_diet_cancer_table.number_of_days, ' days')) as milletProtocol")
                ->selectRaw("sd_millets_table.millet_type,sd_millets_table.nutrition,sd_millets_table.description, sd_millets_table.scientific_name, sd_millets_table.uses")
                ->leftJoin('sd_millets_table', 'sd_millet_diet_cancer_table.millet_Id', '=', 'sd_millets_table.id')->where('sd_millet_diet_cancer_table.cancer_type_id', '=' , $cancer->id)->get();
            $obj -> Type_of_Ailment = $cancer->cancer_type;
            $obj->Dictoction_Kashayam_Diet = $cancer->dictoction_kashayas_juice_every_week . '<br>'. $cancer->dictoction_kashayas_juice_afternoon_each_week;
            $obj->Tags_Keywords = $cancer->tags;
            //$obj->description= $cancer->description;
            $obj->milletProtocol ='<ol>';
            foreach($rows as $row) {
                $obj->milletProtocol = '<li>'.$row->milletProtocol . '</li>';
            }
            $obj->milletProtocol ='</ol>';
            
            $arr[] = $obj;

        }
        return $arr;
    }
}