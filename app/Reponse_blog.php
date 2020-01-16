<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Reponse_blog extends Model
{
    protected $table = 'reponse_blog';

    protected $fillable = [
        'description','id_commentaire', 'id_blog','date','pseudo'
    ];
    public static function getReponse_blog(){
        return(DB::table('reponse_blog') -> get());
    }

    public static function ajout_reponse($id){
        $pseudo = request('pseudo');
        if (!isset($pseudo)){
            $pseudo = 'Anonyme';
        }
        Reponse_blog::create([
            'description' => request('description'),
            'id_commentaire' => $id,
            'pseudo' => $pseudo,
            'date' => now(),
            'id_blog' => DB::table('commentaire_blog')->where('id', $id)->pluck('id_blog')[0]
        ]);
    }
    public static function suppr_reponse_total($id){
        DB::table('reponse_blog')->where('id_blog', $id)->delete();
    }
    public static function suppr_reponse_unique($id){
        DB::table('reponse_blog')->where('id', $id)->delete();
    }
    public static function suppr_reponse_commentaire($id){
        DB::table('reponse_blog')->where('id_commentaire', $id)->delete();
    }
}
