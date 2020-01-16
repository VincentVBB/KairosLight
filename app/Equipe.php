<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class Equipe extends Model
{
    protected $table = 'equipe';
    protected $fillable = [
        'prenom', 'nom', 'role','date_entree','description','photo',
    ];

    public static function getEquipe(){
        return(DB::table('equipe') -> get());
    }


    public static function ajout_membre($path){
        $membre = Equipe::create([
            'description' => request('description'),
            'prenom' => request('prenom'),
            'nom' => request('nom'),
            'role' => request('role'),
            'date_entree' => request('date_entree'),
            'photo' => $path
        ]);
    }
    public static function suppr_membre($id){
        $path = DB::table('equipe')->where('id', $id)->pluck('photo');
        Storage::disk('ftp')->delete($path[0]);
        DB::table('equipe')->where('id', $id)->delete();
    }
}
