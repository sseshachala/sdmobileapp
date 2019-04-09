<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\Millet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MilletController extends Controller
{

    public function showAllMillets()
    {
        return response()->json(Millet::all());
    }

    public function showOneMillet($id)
    {
        return response()->json(Millet::find($id));
    }
}