<?php

namespace App;
use Illuminate\Support\Facades\Auth;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    protected $table = 'blog';
    protected $fillable = [
        'titre','description','date','photo','id_admin'
    ];

    public static function getBlog(){
        return(DB::table('blog')-> orderBy('id', 'desc') -> get());
    }
    public static function ajout_new($path){

        Blog::create([
            'titre' => request('titre'),
            'date' => now(),
            'photo' => $path,
            'id_admin' => Auth::user()->id,

        ]);
    }
    public static function suppr_new($id){
        $path = DB::table('blog')->where('id', $id)->pluck('photo');
        Storage::disk('ftp')->delete($path[0]);
        DB::table('blog')->where('id', $id)->delete();
    }
}
