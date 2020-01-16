<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Info extends Model
{
    protected $fillable = [
        'association', 'lieu', 'plateforme', 'prix', 'langue','id_admin','contact','reseaux','date_sortie'
    ];
    public static function getInfo(){
        return(DB::table('info') -> get());
    }


    public static function change_info(){
        $id = DB::table('info')->select('id') -> first();
        DB::table('info')->where('id', $id->id)->update(
            ['association' => request('association'),
                'lieu' => request('lieu'),
                'langue' => request('langue'),
                'plateforme' => request('plateforme'),
                'reseaux' => request('reseaux'),
                'prix' => request('prix'),
                'contact' => request('contact'),
                'date_sortie' => request('date_sortie')
            ]);
    }

}
