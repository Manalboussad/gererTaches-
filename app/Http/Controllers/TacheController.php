<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TacheController extends Controller
{
    public function creerTache(request $request)  {
        Auth::user()->taches()->create([
        'titre' => $request->titre,
        'description' => $request->description,
        'projets_id' => $request->projet,     
        ]);

        return back();
    }

    function suppTache(request $request) {
        $id = $request->id;
        $taches = Tache::find($id);
        $taches->delete();
        return back();
    }

    function modifierTache(Request $request ,Tache $tache) {
        $tache->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'projets_id' => $request->projets_id,
        ]);
        return back();
    }

}
