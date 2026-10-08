<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjetController extends Controller
{
function creerprojet(request $request) {
    $request->validate([
        'titre' => 'required|string|max:255',
    ]);

    Auth::user()->projets()->create([
        'titre' => $request->input('titre'),
    ]);
    return back();

}

    function suppProjet(request $request) {
        $id = $request->id;
        $projets = Projet::find($id);
        $projets->delete();
        return back();
    }



}
