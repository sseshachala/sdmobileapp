<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\models\GenericData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenericDataController extends Controller
{

    public function getRecipes()
    {
        return response()->json(GenericData::where('type','=','recipe')->paginate(10));
    }

    public function getMilletLocations()
    {
        return response()->json(GenericData::where('type','=','contact')->paginate(10));
    }

}