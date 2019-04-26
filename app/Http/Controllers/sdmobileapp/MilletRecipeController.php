<?php

namespace App\Http\Controllers\sdmobileapp\models;

use App\sdmobileapp\models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MilletRecipeController extends Controller
{

    public function showAll()
    {
        return response()->json(Recipe::paginate(10));
    }

}