<?php

namespace App\Http\Controllers;

use App\Paragraphe_info_accueil;
use App\Presentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresentationController extends Controller
{
    public function change_YT_Link(Request $request){
        Presentation::change_YT_Link();
        return redirect()->route('admin_Accueil');
    }
    public function change_info_jeu(Request $request){
        $id = Presentation::getID();
        Paragraphe_info_accueil::suppr_paragraphe($id->id);
        Presentation::change_info_jeu();
        return redirect()->route('admin_Accueil');
    }
    public function ajout_paragraphe(Request $request){
        $id = $request->input('id_info');
        Paragraphe_info_accueil::ajout_paragraphe($id);
        return redirect()->route('admin_Accueil');
    }

    public function change_YT_Link_presskit(Request $request){
        Presentation::change_YT_Link_presskit();
        return redirect()->route('admin_Presskit');
    }
    public function change_QNS(Request $request){
        Presentation::change_QNS();
        return redirect()->route('admin_Presskit');
    }
}
