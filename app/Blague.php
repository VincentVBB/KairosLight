<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class Blague extends Model
{
    protected $table = 'blague';
    protected $fillable = [
        'titre','description','date','image','id_admin'
    ];

    public static function getBlague(){
        return(DB::table('blague')-> orderBy('id', 'desc') -> get());
    }

    public static function ajout_blague($path){

        Blague::create([
            'titre' => request('titre'),
            'description' => request('description'),
            'date' => now(),
            'image' => $path,
            'id_admin' => Auth::user()->id,
        ]);

    }
    public static function suppr_blague($id){
        $path = DB::table('blague')->where('id', $id)->pluck('image');
        Storage::disk('ftp')->delete($path[0]);
        DB::table('blague')->where('id', $id)->delete();
    }
}
