<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{

    public function showAllMenu()
    {
        return response()->json(Menu::selectRaw('id, icon, menu_name, service_url as service_name')->where('enabled', 1)->orderBy('order_by', 'asc')->get());
    }

}