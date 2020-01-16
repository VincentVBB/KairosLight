<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Presentation extends Model
{
    protected $fillable = [
        'lien_galerie', 'lien_youtube', 'info_jeu', 'qui_nous_sommes', 'logo','id_admin'
    ];

    public static function getPresentation(){
        return(DB::table('presentation')->get());
    }
    public static function getID(){
        return(DB::table('presentation')->select('id') -> first());
    }
    public static function getDescYT(){
        return(DB::table('presentation')->select('lien_youtube') -> first());
    }
    public static function getInfoJeu(){
        return(DB::table('presentation')->select('info_jeu') -> first());
    }
    public static function change_YT_Link(){
        $id = DB::table('presentation')->select('id') -> first();
        DB::table('presentation')->where('id', $id->id)->update(['lien_youtube' => request('link_YT')]);
    }
    public static function change_info_jeu(){
        $id = DB::table('presentation')->select('id') -> first();
        DB::table('presentation')->where('id', $id->id)->update(['info_jeu' => request('info_jeu')]);
    }
    public static function change_YT_Link_presskit(){
        $id = DB::table('presentation')->select('id') -> first();
        DB::table('presentation')->where('id', $id->id)->update(['lien_youtube_presskit' => request('link_YT')]);
    }
    public static function change_QNS(){
        $id = DB::table('presentation')->select('id') -> first();
        DB::table('presentation')->where('id', $id->id)->update(['qui_nous_sommes' => request('qui_nous_sommes')]);
    }
}
