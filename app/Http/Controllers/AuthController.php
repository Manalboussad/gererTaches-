<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function showLogin() {
        return view("login");
    }

    function showRegister() {
        return view("register");
    }

    function showHome(Request $request, $filter='all') {
        $projets = Auth::user()->projets;
        $query = Auth::user()->taches();// taches sans parenthese veut dire on a recuperer toute les taches de la base de données. 
        //mais si on mets les parentheses pour taches() genre on dis a la base de données to get ready on va appliquer un filtre


        if ($filter === 'inbox') {
            $query->whereNull('projets_id');
        }
        elseif ($filter !== 'all') {
            $query->where('projets_id', $filter);
        }

        $taches = $query->latest()->get();

        return view("home", compact('taches','projets','filter'));
    }
    
    function register(request $request){
        $nom = $request->input("nom");
        $email = $request->input("email");
        $password= $request->input("password");

        $user = User::create([
            "name" => $nom,
            "email" => $email,
            "password" => Hash::make($password),
        ]);

        Auth::login($user);
        return redirect()->route("home");
        
        // le user sinscrit sera directement redigé vers home , 
        //si je mis return redirect()->route("login"); il sinscrit puis il se connecte pour rentrer a home  
    }

    function login(request $request){
        $infos = $request->only("email", "password");

        if(Auth::attempt($infos)){
            $request->session()->regenerate();
            return redirect("/home");
        }
        return back()->withErrors(["e" => "informations incorrectes "]);
    }

    function logout (request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    

    

}