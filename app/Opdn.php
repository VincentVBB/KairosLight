<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Opdn extends Model
{
    protected $table = 'opdn';

    protected $fillable = [
        'lien','id_admin'
    ];
    public static function getOpdn(){
        return(DB::table('opdn') -> get());
    }

    public static function ajout_opdn(){
        Opdn::create([
            'lien' => request('lien'),
            'id_admin' => Auth::user()->id,
        ]);
    }
    public static function suppr_opdn($id){
        DB::table('opdn')->where('id', $id)->delete();

    }
}
