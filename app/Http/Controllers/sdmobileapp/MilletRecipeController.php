<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MilletRecipeController extends Controller
{

    public function showAll()
    {
        return response()->json(Recipe::paginate(10));
    }

}