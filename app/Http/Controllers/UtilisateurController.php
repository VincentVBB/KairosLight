<?php

namespace App\Http\Controllers;

use App\Utilisateur;

use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function pageInscription()
    {
        return view('inscription');
    }
    public function homeUtilisateur()
    {
        return view('utilisateur');
    }


    public function envoi_inscription(Request $request){
        $validateData = $request -> validate([
            'email' => ['email' , 'required','unique:utilisateur,email'],
            'password' => ['required','confirmed'],
            'password_confirmation' => ['required'],

            'avatar' => ['image' => 'mimes:png,jpeg'],
        ]);
        Utilisateur::ajout_utilisateur();
        return view('inscription');
    }
}
