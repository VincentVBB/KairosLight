<?php

namespace App\Http\Controllers;
use App\A_venir;
use App\Blague;
use App\Blog;
use App\Equipe;
use App\Feature;
use App\Galerie;
use App\Info;
use App\Info_principale;
use App\Opdn;
use App\Phasetest;
use App\Presentation;
use App\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function homeAdmin()
    {
        $equipes = Equipe::getEquipe();
        return view('admin',['equipes'=> $equipes]);
    }
    public function admin_Accueil()
    {
        $presentation = Presentation::getPresentation();
        return view('admin_Accueil',['presentation'=> $presentation]);
    }
    public function admin_Galerie()
    {
        $galeries = Galerie::getGalerie();
        return view('admin_Galerie', ['galeries'=> $galeries]);
    }

    public function admin_phasetest()
    {
        $phasetests = Phasetest::getPhasetest();
        return view('admin_phasetest', ['phasetests'=> $phasetests]);
    }


    public function admin_Blog()
    {
        $blogs = Blog::getBlog();
        $blagues = Blague::getBlague();
        return view('admin_Blog',['blogs' => $blogs,'blagues' => $blagues]);
    }
    public function admin_Presskit()
    {
        $presentation = Presentation::getPresentation();
        $info = Info::getInfo();
        $info_principales = Info_principale::getInfoPrincipale();
        $features = Feature::getFeature();
        $a_venir = A_venir::getA_venir();
        $opdns = Opdn::getOpdn();
        return view('admin_Presskit',['info'=>$info,'info_principales'=>$info_principales, 'presentation'=> $presentation,'features'=>$features, 'a_venir' => $a_venir,'opdns'=>$opdns]);
    }

    public function envoi_inscription_admin(Request $request){
        $validateData = $request -> validate([
            'email' => ['email' , 'required','unique:utilisateur,email'],
            'password' => ['required','confirmed'],
            'password_confirmation' => ['required'],

            'avatar' => ['image' => 'mimes:png,jpeg'],
        ]);
        Utilisateur::ajout_admin();
        return redirect()->route('admin');
    }
    public function changeEmailAdmin(Request $request){

        $validateData = $request -> validate([
            'emailChange' => ['email' , 'required','unique:utilisateur,email','confirmed'],
            'emailChange_confirmation' => ['required'],
        ]);
        Utilisateur::ChangeEmailAdmin();
        return redirect()->route('admin');
    }
    public function changePasswordAdmin(Request $request){
        $validateData = $request -> validate([
            'password' => ['required','confirmed'],
            'password_confirmation' => ['required'],
        ]);
        Utilisateur::changePasswordAdmin();
        return redirect()->route('admin');
    }
    public function changeOptionnelAdmin(Request $request){
        Utilisateur::ChangeOptionnelAdmin();
        return redirect()->route('admin');
    }
}
