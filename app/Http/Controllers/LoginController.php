<?php

namespace App\Http\Controllers;

use App\Utilisateur;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function pageConnexion()
    {
        return view('connexion');
    }

    public function pageConnexionAdmin()
    {
        return view('connexionAdmin');
    }

    public static function isadmin()
    {
        $email = request('email');
        $utilisateur = DB::table('utilisateur') ->where('email',$email)->pluck('admin');
        if (isset($utilisateur[0])){
            return $utilisateur[0];
        }
        return false;
    }

    public function connexion(Request $request)
    {
        $validateData = $request->validate([
            'email' => ['email', 'required'],
            'password' => ['required']
        ]);

        $login = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);

        if (!$this->isadmin() && $login) {
            return redirect('/');
        } else {
            return redirect('/admin');
        }
    }


    public function connexionAdmin(Request $request)
    {
        $validateData = $request->validate([
            'email' => ['email', 'required'],
            'password' => ['required']
        ]);

        $login = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);
        if ($this->isadmin() && $login){
            return redirect('/admin');
        }
        else{
            return redirect('/connexionAdmin');
        }
    }


    public function logout(){
        auth()->logout();
        return redirect('/');
    }

}
