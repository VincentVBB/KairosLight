<?php

namespace App\Http\Controllers;
use App\Paragraphe_info_accueil;
use App\Presentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Auth;

class AccueilController extends Controller
{
    public function accueil(){
        $lien_youtube = Presentation::getDescYT();
        $info_jeu = Presentation::getInfoJeu();
        $paragraphes = Paragraphe_info_accueil::getParagraphe();
        return view('accueil', ['lien_youtube' => $lien_youtube,'info_jeu'=> $info_jeu,'paragraphes'=>$paragraphes]);
    }

}
