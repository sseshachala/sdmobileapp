<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\MilletDietForDisease;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MilletDietForDiseaseController extends Controller
{

    public function showAllMilletDiet()
    {
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );
        return response()->json(MilletDietForDisease::milletDiet(),200, $header, JSON_UNESCAPED_UNICODE);
    }

    public function showOneMilletDiet($id)
    {
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );
        return response()->json(MilletDietForDisease::find($id), $header, 200, JSON_UNESCAPED_UNICODE);
    }

    public function findMilletByDisease($searchTerm)
    {
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );
        return response()->json(MilletDietForDisease::filter($searchTerm), $header,200, JSON_UNESCAPED_UNICODE);
    }



}