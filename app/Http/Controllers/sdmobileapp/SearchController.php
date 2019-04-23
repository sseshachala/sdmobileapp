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

        switch ($filterType)
        {
            case 'ailment_or_disease': return response()->json(MilletDietForDisease::filter($searchTerm)); break;
            case 'cancer_type': return response()->json(MilletDietForCancer::filter($searchTerm)); break;
        }
    }
}