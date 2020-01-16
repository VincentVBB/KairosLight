<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Feature extends Model
{
    protected $table = 'feature';
    protected $fillable = [
        'titre', 'description','id_admin'
    ];

    public static function getFeature(){
        return(DB::table('feature') -> get());
    }

    public static function ajout_feature(){

        Feature::create([
            'titre' => request('titre'),
            'description' => request('description'),
            'id_admin' => Auth::user()->id,
        ]);
    }
    public static function suppr_feature($id){
        DB::table('feature')->where('id', $id)->delete();
    }
}
