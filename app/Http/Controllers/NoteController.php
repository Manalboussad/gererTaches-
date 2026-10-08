<?php

namespace App\Http\Controllers;

use App\Models\note;
use Illuminate\Http\Request;


class NoteController extends Controller
{
    public function showNote()
    {
        return view('notes');
    }
    
    public function index()
    {
        $notes = Note::all();

        return response()->json($notes);
    }



}
