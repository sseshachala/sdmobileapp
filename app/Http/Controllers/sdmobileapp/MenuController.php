<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{

    public function showAllMenu()
    {
        return response()->json(Menu::where('enabled', 1)->orderBy('order_by', 'asc')->get());
    }

}