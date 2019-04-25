<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\models\AppProfileType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppProfileTypeController extends Controller
{

    public function showAll()
    {
        return response()->json(AppProfileType::all());
    }
}