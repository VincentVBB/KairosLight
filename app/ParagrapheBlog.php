<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ParagrapheBlog extends Model
{
    protected $table = 'paragraphe_blog';
    protected $fillable = [
        'paragraphe','id_blog','id_admin'
    ];

    public static function getParagraphe(){
        return (DB::table('paragraphe_blog')-> orderBy('id', 'desc') -> get());
    }
    public static function suppr_paragraphe($id){
        DB::table('paragraphe_blog')->where('id_blog', $id)->delete();
    }
    public static function ajout_paragraphe($id){
        ParagrapheBlog::create([
            'paragraphe' => request('paragraphe'),
            'id_blog' => $id,
            'id_admin' => Auth::user()->id,
        ]);
    }
}
