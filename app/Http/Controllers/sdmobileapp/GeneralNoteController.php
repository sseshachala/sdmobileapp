<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\models\GeneralNote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralNoteController extends Controller
{

    public function showAllNotes()
    {
        return response()->json(GeneralNote::paginate(10));
    }

    public function showOneNote($id)
    {
        return response()->json(GeneralNote::find($id));
    }
}