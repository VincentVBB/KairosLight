<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class A_venir extends Model
{
    protected $table = 'a_venir';

    protected $fillable = [
        'description','id_admin','titre'
    ];
    public static function getA_venir(){
        return(DB::table('a_venir') -> get());
    }

    public static function ajout_a_venir(){
        A_venir::create([
            'titre' => request('titre'),
            'description' => request('description'),
            'id_admin' => Auth::user()->id,
        ]);
    }
    public static function suppr_a_venir($id){
        DB::table('a_venir')->where('id', $id)->delete();

    }
}
