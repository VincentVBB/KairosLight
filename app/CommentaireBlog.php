<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CommentaireBlog extends Model
{
    protected $table = 'commentaire_blog';
    protected $fillable = [
        'commentaire','id_blog','date','pseudo'
    ];

    public static function ajout_commentaire($id){
        $pseudo = request('pseudo');
        if (!isset($pseudo)){
            $pseudo = 'Anonyme';
        }
        CommentaireBlog::create([
            'commentaire' => request('commentaire'),
            'pseudo' => $pseudo,
            'id_blog' => $id,
            'date' => now(),
        ]);
    }
    public static function suppr_commentaire($id){
        DB::table('commentaire_blog')->where('id_blog', $id)->delete();
    }
    public static function suppr_commentaire_unique($id){
        DB::table('commentaire_blog')->where('id', $id)->delete();
    }

}
