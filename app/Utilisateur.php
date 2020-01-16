<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Utilisateur extends Model implements Authenticatable
{
    Use BasicAuthenticatable;
    protected $table = 'utilisateur';
    protected $fillable = [
        'email', 'mot_de_passe', 'prenom', 'nom', 'region','date_naissance','admin'
    ];

    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }


    public static function ajout_utilisateur(){
        $user = Utilisateur::create([
            'email' => request('email'),
            'mot_de_passe' => bcrypt(request('password')),

            'prenom' => request('prenom'),
            'nom' => request('nom'),
            'region' => request('region'),
            'date_naissance' => request('date_naissance'),
            'admin' => false,
        ]);
    }
    public static function ajout_admin(){
        $user = Utilisateur::create([
            'email' => request('email'),
            'mot_de_passe' => bcrypt(request('password')),
            'prenom' => request('prenom'),
            'nom' => request('nom'),
            'region' => request('region'),
            'date_naissance' => request('date_naissance'),
            'admin' => true,
        ]);
    }
    public static function ChangeEmailAdmin(){
        DB::table('utilisateur')->where('id', Auth::user()->id)->update(['email' => request('emailChange')]);
    }
    public static function changePasswordAdmin(){
        DB::table('utilisateur')->where('id', Auth::user()->id)->update(['mot_de_passe' => bcrypt(request('password'))]);
    }
    public static function changeOptionnelAdmin(){
        DB::table('utilisateur')->where('id', Auth::user()->id)->update(['region' => request('region'),'date_naissance' => request('date_naissance'),'prenom' => request('prenom'),'nom' => request('nom')]);
    }
}
