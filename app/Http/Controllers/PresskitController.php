<?php

namespace App\Http\Controllers;

use App\A_venir;
use App\Equipe;
use App\Info;
use App\Feature;
use App\Info_principale;
use App\Opdn;
use App\ParagrapheBlog;
use Illuminate\Support\Facades\Auth;

use App\Presentation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class PresskitController extends Controller
{
    public function presskit()
    {
        $presentation = Presentation::getPresentation();
        $equipes = Equipe::getEquipe();
        $info = Info::getInfo();
        $features = Feature::getFeature();
        $info_principales = Info_principale::getInfoPrincipale();
        $a_venir = A_venir::getA_venir();
        $opdns = Opdn::getOpdn();
        return view('presskit',['equipes'=> $equipes, 'presentation' => $presentation, 'info' => $info,'features'=>$features,'info_principales' => $info_principales,'a_venir' => $a_venir,'opdns'=>$opdns]);
    }
    public function change_info(Request $request){
        Info::change_info();
        return redirect(route('admin_Presskit'));
    }
    public function ajout_info_principale(Request $request){
        Info_principale::ajout_info_principale();
        return redirect(route('admin_Presskit'));
    }
    public function suppr_info_principale(Request $request){
        $validateData = $request -> validate([
            'id' => ['required'],]);
        $id = $request->input('id');
        Info_principale::suppr_info_principale($id);
        return redirect()->route('admin_Presskit');
    }
    public function ajout_feature(Request $request){
        $validateData = $request -> validate([
            'titre' => ['required'],
            'description' => ['required']
        ]);
        Feature::ajout_feature();
        return redirect(route('admin_Presskit'));
    }
    public function suppr_feature(Request $request){
        $validateData = $request -> validate([
            'id' => ['required'],]);
        $id = $request->input('id');
        Feature::suppr_feature($id);
        return redirect()->route('admin_Presskit');
    }

    public function ajout_a_venir(Request $request){
        $validateData = $request -> validate([
            'titre' => ['required'],
            'description' => ['required']
        ]);
        A_venir::ajout_a_venir();
        return redirect(route('admin_Presskit'));
    }

    public function suppr_a_venir(Request $request){
        $validateData = $request -> validate([
            'id' => ['required'],]);
        $id = $request->input('id');
        A_venir::suppr_a_venir($id);
        return redirect()->route('admin_Presskit');
    }

    public function ajout_opdn(Request $request){
        $validateData = $request -> validate([
            'lien' => ['required']
        ]);
        Opdn::ajout_opdn();
        return redirect(route('admin_Presskit'));
    }

    public function suppr_opdn(Request $request){
        $validateData = $request -> validate([
            'id' => ['required'],]);
        $id = $request->input('id');
        Opdn::suppr_opdn($id);
        return redirect()->route('admin_Presskit');
    }

}
