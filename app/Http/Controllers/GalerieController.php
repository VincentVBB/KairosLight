<?php

namespace App\Http\Controllers;
use App\Galerie;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class GalerieController extends Controller
{
    public function galerie(){
        $galeries = Galerie::getGalerie();
        return view('galerie', ['galeries'=> $galeries]);
    }


    public function ajout_img(Request $request){
        $validateData = $request -> validate([
            'img' => ['image' => 'mimes:png','required']
        ]);
        if($request->hasFile('img')) {

            $filenamewithextension = $request->file('img')->getClientOriginalName();

            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            $extension = $request->file('img')->getClientOriginalExtension();

            $filenametostore = 'Galerie/'.$filename.'_'.uniqid().'.'.$extension;

            Storage::disk('ftp')->put($filenametostore, fopen($request->file('img'), 'r+'));
        }
        Galerie::ajout_img($filenametostore);
        return redirect()->route('admin_Galerie');
    }

    public function suppr_img(Request $request){
        $validateData = $request -> validate([
            'id' => ['required'],]);
        $id = $request->input('id');
        Galerie::suppr_img($id);
        return redirect()->route('admin_Galerie');
    }
}
