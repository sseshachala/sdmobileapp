<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\MilletDietForCancer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MilletDietForCancerController extends Controller
{

    public function showAllMilletDiet()
    {
        return response()->json(MilletDietForCancer::milletDiet());
    }

    public function showOneMilletDiet($id)
    {
        return response()->json(MilletDietForCancer::find($id));
    }

    public function findMilletByCancer($searchTerm)
    {
        return response()->json(MilletDietForCancer::filter($searchTerm));
    }



}