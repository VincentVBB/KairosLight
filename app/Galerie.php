<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Galerie extends Model
{
    protected $table = 'galerie';
    protected $fillable = [
        'chemin'
    ];
    public static function getGalerie(){
         return(DB::table('galerie') -> get());
    }

    public static function ajout_img($path){

        Galerie::create([
            'chemin' => $path,
        ]);
    }

    public static function suppr_img($id){
        $path = DB::table('galerie')->where('id', $id)->pluck('chemin');
        Storage::disk('ftp')->delete($path[0]);
        DB::table('galerie')->where('id', $id)->delete();
    }
}
