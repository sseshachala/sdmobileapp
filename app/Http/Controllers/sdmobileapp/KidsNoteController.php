<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\KidsNote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KidsNoteController extends Controller
{

    public function showAllNotes()
    {
        return response()->json(KidsNote::paginate(10));
    }

    public function showOneNote($id)
    {
        return response()->json(KidsNote::find($id));
    }
}