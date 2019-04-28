<?php

namespace App\Http\Controllers\sdmobileapp;


use App\sdmobileapp\models\MilletDietForDisease;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function getFilterTypes() {
        return ['ailment_or_disease'=> 'Ailment', 'cancer_type'=>'Cancer Type'];
    }


    public function doSearch($searchTerm) {

        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );

        $results = MilletDietForDisease::filter(filter_var($searchTerm, FILTER_SANITIZE_STRING));

        return response()->json($results, 200, $header, JSON_UNESCAPED_UNICODE);

        /*
         *
         switch ($filterType)
        {
            case 'ailment_or_disease': return response()->json(MilletDietForDisease::filter(filter_var($searchTerm, FILTER_SANITIZE_STRING)), 200, $header, JSON_UNESCAPED_UNICODE); break;
            case 'cancer_type': return response()->json(MilletDietForCancer::filter(filter_var($searchTerm, FILTER_SANITIZE_STRING)), 200, $header, JSON_UNESCAPED_UNICODE); break;
        }
        */
    }

    public function doSearchPost(Request $request) {

        //print_r($request); die();
        $searchTerm = $request->searchTerm;


        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );

        $results = MilletDietForDisease::filter(filter_var($searchTerm, FILTER_SANITIZE_STRING));

        return response()->json($results, 200, $header, JSON_UNESCAPED_UNICODE);

    }
}