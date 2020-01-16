<?php

namespace App\Http\Controllers;
use App\Blague;

use App\Blog;
use App\CommentaireBlog;
use App\Evaluation_blague;
use App\ParagrapheBlog;
use App\Reponse_blog;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class BlogController extends Controller
{
    public function blog(){
        $blogs = Blog::getBlog();
        $evals = [];
        $admins = [];
        $paragraphes = [];
        $commentaires = [];
        $reponses = [];
        $blagues = Blague::getBlague();
        foreach ($blagues as $blague){
            $eval = DB::table('evaluation_blague')->where('id_blague', $blague->id)->get();
            $evals = Arr::add($evals,$blague->id, $eval);
        }
        foreach ($blogs as $blog){
            $paragraphe = DB::table('paragraphe_blog')->where('id_blog', $blog->id)->get();
            $paragraphes = Arr::add($paragraphes, $blog->id, $paragraphe);
            $commentaire = DB::table('commentaire_blog')->where('id_blog', $blog->id)->orderBy('id', 'desc')->get();
            $commentaires = Arr::add($commentaires, $blog->id, $commentaire);
            $admin = DB::table('utilisateur')->where('id', $blog->id_admin)->get();
            $admins = Arr::add($admins, $blog->id ,$admin);
        }

        foreach($commentaires as $commentaire){
            for ($i = 0; $i < (sizeof($commentaire)); $i++) {
                $reponse = DB::table('reponse_blog')->where('id_commentaire', $commentaire[$i]->id)->orderBy('id', 'asc')->get();
                $reponses = Arr::add($reponses, $commentaire[$i]->id, $reponse);
            }
        }
        return view('blog', ['blogs' => $blogs,'admins' => $admins, 'paragraphes'=>$paragraphes,'commentaires'=>$commentaires,'blagues'=>$blagues,'evals'=>$evals,'reponses'=>$reponses]);
    }

    public function ajout_new(Request $request){
        $validateData = $request -> validate([
            'titre' => ['required'],
            'img' => ['image' => 'mimes:png','required']
        ]);
        if($request->hasFile('img')) {

            $filenamewithextension = $request->file('img')->getClientOriginalName();

            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            $extension = $request->file('img')->getClientOriginalExtension();

            $filenametostore = 'Blog/'.$filename.'_'.uniqid().'.'.$extension;

            Storage::disk('ftp')->put($filenametostore, fopen($request->file('img'), 'r+'));
        }

        Blog::ajout_new($filenametostore);
        return redirect()->route('admin_Blog');
    }

    public function suppr_new(Request $request){
        $validateData = $request -> validate([
            'id' => ['required'],]);
        $id = $request->input('id');
        Reponse_blog::suppr_reponse_total($id);
        CommentaireBlog::suppr_commentaire($id);
        ParagrapheBlog::suppr_paragraphe($id);
        Blog::suppr_new($id);
        return redirect()->route('admin_Blog');
    }
    public function suppr_commentaire_unique(Request $request){
        $validateData = $request -> validate([
            'id' => ['required'],]);
        $id = $request->input('id');
        Reponse_blog::suppr_reponse_commentaire($id);
        CommentaireBlog::suppr_commentaire_unique($id);
        return redirect()->route('blog');
    }





    public function ajout_paragraphe(Request $request)
    {
        $validateData = $request->validate([
            'paragraphe' => ['required'],
            'id_blog' => ['required']
        ]);
        $id = $request->input('id_blog');
        ParagrapheBlog::ajout_paragraphe($id);
        return redirect()->route('admin_Blog');

    }

    public function ajout_commentaire(Request $request)
    {
        $validateData = $request->validate([
            'commentaire' => ['required'],
            'id_blog' => ['required']
        ]);
        $id = $request->input('id_blog');
        CommentaireBlog::ajout_commentaire($id);
        return redirect()->route('blog');

    }


    public function ajout_reponse(Request $request)
    {
        $validateData = $request->validate([
            'description' => ['required'],
            'id_commentaire' => ['required']
        ]);
        $id = $request->input('id_commentaire');
        Reponse_blog::ajout_reponse($id);
        return redirect()->route('blog');
    }


    public function suppr_reponse_unique(Request $request){
        $validateData = $request -> validate([
            'id' => ['required'],]);
        $id = $request->input('id');
        Reponse_blog::suppr_reponse_unique($id);
        return redirect()->route('blog');
    }




    public function ajout_blague(Request $request){

        $validateData = $request -> validate([
            'titre' => ['required'],
            'description' => ['required'],
            'image' => ['image' => 'mimes:png','required']
        ]);
        if($request->hasFile('image')) {

            $filenamewithextension = $request->file('image')->getClientOriginalName();

            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            $extension = $request->file('image')->getClientOriginalExtension();

            $filenametostore = 'Blague/'.$filename.'_'.uniqid().'.'.$extension;

            Storage::disk('ftp')->put($filenametostore, fopen($request->file('image'), 'r+'));
        }
        Blague::ajout_blague($filenametostore);
        $id = DB::table('blague')->where('image', $filenametostore)->value('id');
        Evaluation_blague::ajout_eval_blague($id);
        return redirect()->route('admin_Blog');
    }

    public function suppr_blague(Request $request){
        $validateData = $request -> validate([
            'id' => ['required'],]);
        $id = $request->input('id');
        Evaluation_blague::suppr_eval_blague($id);
        Blague::suppr_blague($id);
        return redirect()->route('admin_Blog');
    }

    public function oui(Request $request){

        if($request->hasCookie('dejavote') == false){
            Evaluation_blague::oui();
            $cookie = cookie('dejavote', 'value', 120);
            return redirect(route('blog'))->cookie($cookie);
        }
        return redirect(route('blog'));
    }
    public function non(Request $request){
        if($request->hasCookie('dejavote') == false) {
            Evaluation_blague::non();
            $cookie = cookie('dejavote', 'value', 120);
            return redirect(route('blog'))->cookie($cookie);
        }
        return redirect(route('blog'));
    }


}

