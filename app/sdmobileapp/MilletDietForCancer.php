<?php

namespace App\sdmobileapp;


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
         * Select sd_millet_diet_cancer_table.id,sd_cancer_table.cancer_type, sd_cancer_table.dictoction_kashayas_juice_afternoon_each_week,
         * sd_cancer_table.dictoction_kashayas_juice_every_week, sd_millets_table.name, sd_millets_table.millet_type, sd_millets_table.description,sd_millet_diet_cancer_table.number_of_days From sd_millet_diet_cancer_table left join sd_millets_table on sd_millet_diet_cancer_table.millet_id=sd_millets_table.id left join sd_cancer_table on sd_millet_diet_cancer_table.cancer_type_id = sd_cancer_table.id\
         *
         */
        $cancers = Cancer::all();
        return MilletDietForCancer::getMilletDietForCancer($cancers);


    }

    public static function filter($searchTerm) {

        /*$searchValues = preg_split('/\s+/', $searchTerm, -1, PREG_SPLIT_NO_EMPTY);
        $searchValues = explode(' ', $searchTerm);

        $cancers = Cancer::where(function ($query) use ($searchValues) {
            foreach ($searchValues as $searchTerm) {
                $query->where('cancer_type', 'LIKE', '%' . $searchTerm . '%');
            }
        })->orWhere(function ($query) use ($searchValues) {
            foreach($searchValues as $searchTerm) {
                $query->orWhere('dictoction_kashayas_juice_every_week', 'LIKE', '%' . $searchTerm . '%');
            }
        })->orWhere(function ($query) use ($searchValues) {
            foreach($searchValues as $searchTerm) {
                $query->orWhere('dictoction_kashayas_juice_afternoon_each_week', 'LIKE', '%' . $searchTerm . '%');
            }
        })->orWhere(function ($query) use ($searchValues) {
            foreach($searchValues as $searchTerm) {
                $query->orWhere('tags', 'LIKE', '%' . $searchTerm . '%');
            }
        })->toSql();

        dd($cancers);*/



        $reserved = array("*", ".", "+", "-");


        if (in_array($searchTerm, $reserved)) {
           return MilletDietForCancer::milletDiet();
        }

        $cancers = Cancer::selectRaw("*, MATCH(cancer_type, dictoction_kashayas_juice_every_week, dictoction_kashayas_juice_afternoon_each_week, tags) AGAINST('$searchTerm' IN BOOLEAN MODE) as relScore")
            ->whereRaw("MATCH(cancer_type, dictoction_kashayas_juice_every_week, dictoction_kashayas_juice_afternoon_each_week, tags) AGAINST('$searchTerm' IN BOOLEAN MODE)", MilletDietForCancer::fullTextWildcards($searchTerm))
            ->get();

        /*$cancers = Cancer::query()->where('cancer_type', 'LIKE', "%{$searchTerm}%")
                                  ->orWhere('dictoction_kashayas_juice_every_week', 'LIKE', "%{$searchTerm}%")
                                  ->orWhere('dictoction_kashayas_juice_afternoon_each_week', 'LIKE', "%{$searchTerm}%")
                                  ->orWhere('tags', 'LIKE', "%{$searchTerm}%")
                                  ->get();
        */
        return MilletDietForCancer::getMilletDietForCancer($cancers);
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
        foreach($cancers as $cancer) {
            $rows = DB::table('sd_millet_diet_cancer_table')
                ->leftjoin('sd_millets_table', 'sd_millet_diet_cancer_table.millet_id', '=', 'sd_millets_table.id')
                ->leftjoin('sd_cancer_table', 'sd_millet_diet_cancer_table.cancer_type_id', '=', 'sd_cancer_table.id')
                ->select('sd_cancer_table.id', 'sd_cancer_table.tags',
                    'sd_millets_table.name', 'sd_millets_table.millet_type', 'sd_millets_table.description', 'sd_millet_diet_cancer_table.number_of_days')
                ->where('sd_millet_diet_cancer_table.cancer_type_id', '=', $cancer->id)
                ->get();
            $obj = new \ stdClass();
            $obj->id  = $cancer->id;
            $obj -> cancer_type = $cancer->cancer_type;
            $obj->dictoction_kashayas_juice_every_week=$cancer->dictoction_kashayas_juice_every_week;
            $obj-> dictoction_kashayas_juice_afternoon_each_week = $cancer->dictoction_kashayas_juice_afternoon_each_week.'<br><br>Tags<br>'.$cancer->tags;
            //$obj->tags = $cancer->tags;
            $obj-> milletProtocol ='<ul>';

            foreach($rows as $row)
            {
                $obj-> milletProtocol .= "<li>".$row->name .'=' . $row-> number_of_days .' days </li>';
            }
            $obj-> milletProtocol .='</ul>';
            $arr[] = $obj;
        }
        return $arr;
    }
}