<?php

namespace App\Http\Controllers;

use App\Equipe;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class EquipeController extends Controller
{
    public function ajout_membre(Request $request){
        $validateData = $request -> validate([
            'nom' => ['required'],
            'prenom' => ['required'],
            'role' => ['required'],
            'date_entree' => ['required'],
            'description' => ['required'],
            'photo' => ['image' => 'mimes:png']
        ]);

        if($request->hasFile('photo')) {

            $filenamewithextension = $request->file('photo')->getClientOriginalName();

            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            $extension = $request->file('photo')->getClientOriginalExtension();

            $filenametostore = 'PhotoEquipe/'.$filename.'_'.uniqid().'.'.$extension;

            Storage::disk('ftp')->put($filenametostore, fopen($request->file('photo'), 'r+'));
        }
        Equipe::ajout_membre($filenametostore);
        return redirect()->route('admin');
    }
    public function suppr_membre(Request $request){
        $validateData = $request -> validate([
            'id' => ['required'],]);
        $id = $request->input('id');
        Equipe::suppr_membre($id);
        return redirect()->route('admin');
    }
}
