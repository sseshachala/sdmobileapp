<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\KashayaLeaves;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KashayaLeavesController extends Controller
{

    public function showAll()
    {
        return response()->json(KashayaLeaves::paginate(10));
    }

}