<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\MilletDietForCancer;
use App\sdmobileapp\MilletDietForDisease;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function getFilterTypes() {
        return ['ailment_or_disease'=> 'Ailment', 'cancer_type'=>'Cancer Type'];
    }


    public function doSearch($filterType, $searchTerm) {

        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );

        switch ($filterType)
        {
            case 'ailment_or_disease': return response()->json(MilletDietForDisease::filter(filter_var($filterType, FILTER_SANITIZE_STRING)), 200, $header, JSON_UNESCAPED_UNICODE); break;
            case 'cancer_type': return response()->json(MilletDietForCancer::filter(filter_var($filterType, FILTER_SANITIZE_STRING)), 200, $header, JSON_UNESCAPED_UNICODE); break;
        }
    }
}