<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\models\AppSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppSettingController extends Controller
{

    public function showAll()
    {
        return response()->json(AppSetting::all());
    }
}