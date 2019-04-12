<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\GeneralNote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralNoteController extends Controller
{

    public function showAllNotes()
    {
        return response()->json(GeneralNote::all());
    }

    public function showOneNote($id)
    {
        return response()->json(GeneralNote::find($id));
    }
}