<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Evaluation_blague extends Model
{
    protected $table = 'evaluation_blague';
    protected $fillable = [
        'oui', 'non', 'id','id_blague'
    ];

    public static function getEval(){
        return(DB::table('evaluation_blague') -> get());
    }
    public static function oui(){
        $id = request('id');
        $oui = DB::table('evaluation_blague')->where('id_blague', $id)-> first();
        DB::table('evaluation_blague')->where('id_blague', $id)->update(['oui' => ($oui-> oui)+1]);
    }
    public static function non(){
        $id = request('id');
        $non = DB::table('evaluation_blague')->where('id_blague', $id)-> first();
        DB::table('evaluation_blague')->where('id_blague', $id)->update(['non' => ($non-> non)+1]);
    }

    public static function ajout_eval_blague($id){
        Evaluation_blague::create([
            'id_blague' => $id,
        ]);
    }
    public static function suppr_eval_blague($id){
        DB::table('evaluation_blague')->where('id_blague', $id)->delete();

    }
}
