<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\models\MilletDietForCancer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MilletDietForCancerController extends Controller
{

    public function showAllMilletDiet()
    {
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );
        return response()->json(MilletDietForCancer::milletDiet() , 200, $header, JSON_UNESCAPED_UNICODE);
    }

    public function showOneMilletDiet($id)
    {
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );
        return response()->json(MilletDietForCancer::find($id), 200, $header, JSON_UNESCAPED_UNICODE);
    }

    public function findMilletByCancer($searchTerm)
    {
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );
        return response()->json(MilletDietForCancer::filter(filter_var($searchTerm, FILTER_SANITIZE_STRING)), 200, $header, JSON_UNESCAPED_UNICODE);
    }



}