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
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );
        return response()->json(Millet::find($id) , 200, $header, JSON_UNESCAPED_UNICODE);
        //return response()->json(Millet::find($id));
    }
}