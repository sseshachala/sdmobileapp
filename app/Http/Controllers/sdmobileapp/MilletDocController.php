<?php


namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\MilletDoc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MilletDocController extends Controller
{

    public function showAll()
    {
        return response()->json(MilletDoc::all());
    }

}
