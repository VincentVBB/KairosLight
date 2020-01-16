<?php

namespace App\Http\Controllers;
use App\Paragraphe_info_accueil;
use App\Phasetest;
use App\Presentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailPhaseTest;

class PhasetestController extends Controller
{
    public function pagePhasetest(){
        return view('phasetest');
    }

    public function ajout_phasetest(Request $request){
        $validateData = $request -> validate([
            'email' => ['email' , 'required'],
        ]);
        Phasetest::ajout_phasetest();
        $data = array(
            'name'      =>  'équipe de KairosLight',
            'message'   =>   'https://drive.google.com/open?id=1txrUD-3TYg-h12h0kjipI89pQXobMS6R'
        );
        Mail::to(request('email')) -> send(new MailPhaseTest($data));


        return view('phasetest');
    }

}
