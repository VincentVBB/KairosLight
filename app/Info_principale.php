<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Info_principale extends Model
{
    protected $table = 'info_principale';

    protected $fillable = [
        'paragraphe','id_admin'
    ];
    public static function getInfoPrincipale(){
        return(DB::table('info_principale') -> get());
    }

    public static function ajout_info_principale(){
        Info_principale::create([
            'paragraphe' => request('paragraphe'),
            'id_admin' => Auth::user()->id,
        ]);
    }
    public static function suppr_info_principale($id){
        DB::table('info_principale')->where('id', $id)->delete();

    }
}
