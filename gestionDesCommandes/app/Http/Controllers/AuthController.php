<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function inscription()
    {
        return view('inscription');
    }
    public function inscriptionPost(Request $request)
{
    $request->validate([
        'nom' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'mot_de_passe' => 'required|min:8|max:20'
    ]);

    $user = new User();
    $user->nom = $request->nom;
    $user->email = $request->email;
    $user->mot_de_passe = Hash::make($request->mot_de_passe); // Utilisez mot_de_passe

    $user->save();

    return back()->with('success', 'Inscription réussie');
}


public function connexion()
{
    return view('connexion');
}

public function connexionPost(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'mot_de_passe' => 'required|string|min:8'
    ]);

    $credentials = [
        'email' => $request->email,
        'password' => $request->mot_de_passe // Toujours utiliser 'password' ici
    ];

    if (Auth::attempt($credentials)) {
        return redirect()->route('index')->with('success', 'Connexion réussie');
    }

    return back()->with('error', 'Email ou mot de passe incorrect');
}


    public function deconnexion()
    {
        Auth::logout();

        return redirect()->route('connexion');
    }

}
