<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Paragraphe_info_accueil extends Model
{
    protected $table = 'paragraphe_info_accueil';
    protected $fillable = [
        'paragraphe','id_info','id_admin'
    ];

    public static function getParagraphe(){
        return (DB::table('paragraphe_info_accueil')->get());
    }
    public static function suppr_paragraphe($id){
        DB::table('paragraphe_info_accueil')->where('id_info', $id)->delete();
    }
    public static function ajout_paragraphe($id){
        Paragraphe_info_accueil::create([
            'paragraphe' => request('paragraphe'),
            'id_info' => $id,
            'id_admin' => Auth::user()->id,
        ]);
    }
}
