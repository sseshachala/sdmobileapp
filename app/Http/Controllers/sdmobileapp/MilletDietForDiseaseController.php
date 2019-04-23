<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\MilletDietForDisease;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MilletDietForDiseaseController extends Controller
{

    public function showAllMilletDiet()
    {
        return response()->json(MilletDietForDisease::milletDiet());
    }

    public function showOneMilletDiet($id)
    {
        return response()->json(MilletDietForDisease::find($id));
    }

    public function findMilletByDisease($searchTerm)
    {
        return response()->json(MilletDietForDisease::filter($searchTerm));
    }



}