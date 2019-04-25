<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\models\MilletFaq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MilletFaqController extends Controller
{

    public function showAllFaq()
    {
        return response()->json(MilletFaq::paginate(10));
    }

}