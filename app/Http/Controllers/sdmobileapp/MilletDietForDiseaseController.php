<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\models\MilletDietForDisease;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MilletDietForDiseaseController extends Controller
{

    public function showDiseaseMilletDiet()
    {
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );
        return response()->json(MilletDietForDisease::milletDietByType('general'),200, $header, JSON_UNESCAPED_UNICODE);
    }

    public function showOneMilletDiet($id)
    {
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );
        return response()->json(MilletDietForDisease::find($id), 200,$header, JSON_UNESCAPED_UNICODE);
    }

    public function showCancerMilletDiet()
    {
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );
        return response()->json(MilletDietForDisease::milletDietByType('cancer'),200, $header, JSON_UNESCAPED_UNICODE);
    }


}