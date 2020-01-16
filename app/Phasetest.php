<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Phasetest extends Model
{
    protected $table = 'phasetest';

    protected $fillable = [
        'nom','prenom','email'
    ];
    public static function getPhasetest(){
        return(DB::table('phasetest') -> get());
    }

    public static function ajout_phasetest(){
        Phasetest::create([
            'nom' => request('nom'),
            'prenom' => request('prenom'),
            'email' => request('email')
        ]);
    }

}
