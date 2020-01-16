<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'AccueilController@accueil')->name('accueil');
Route::get('/mentions', function () {return view('mentions');})->name('mentions');

Route::get('/galerie', 'GalerieController@galerie')->name('galerie');
Route::get('/demo', function () {return view('demo');})->name('demo');
Route::get('/noel', function () {return view('noel');})->name('noel');

Route::get('/blog', 'BlogController@blog')->name('blog');
Route::post('/blog', 'BlogController@ajout_commentaire')->name('ajout_commentaire');
Route::post('/blog/reponse', 'BlogController@ajout_reponse')->name('ajout_reponse');

Route::put('/blog/oui','BlogController@oui')->name('oui');
Route::put('/blog/non','BlogController@non')->name('non');

Route::get('/presskit', 'PresskitController@presskit')->name('presskit');



Route::get('/phasetest', 'PhasetestController@pagePhasetest')->name('phasetest');
Route::post('/phasetest', 'PhasetestController@ajout_phasetest')->name('ajout_phasetest');
Route::post('/connexion', 'LoginController@connexion')->name('connexion');

/*
Route::get('/connexion', 'LoginController@pageConnexion');

*/
Route::get('/connexionAdmin', 'LoginController@pageConnexionAdmin')->name('connexionAdmin');
Route::post('/connexionAdmin', 'LoginController@connexionAdmin');

Route::post('/deconnexion', 'LoginController@logout')->name('logout');




//////////////////////PAGE ADMIN/////////////////////////
Route::group(['middleware' => 'App\Http\Middleware\Admin'],function(){
    Route::get('/admin', 'AdminController@homeAdmin')->name('admin');
    Route::post('/admin', 'AdminController@envoi_inscription_admin')->name('addAdmin');
    Route::put('/admin', 'AdminController@changeEmailAdmin')->name('changeEmailAdmin');
    Route::put('/admin/psw', 'AdminController@changePasswordAdmin')->name('changePasswordAdmin');
    Route::put('/admin/opt', 'AdminController@changeOptionnelAdmin')->name('changeOptionnelAdmin');
    Route::post('/admin/equipe', 'EquipeController@ajout_membre')->name('ajout_membre');
    Route::delete('/admin/equipe', 'EquipeController@suppr_membre')->name('suppr_membre');

    Route::get('/admin/accueil', 'AdminController@admin_Accueil')->name('admin_Accueil');
    Route::put('/admin/accueil', 'PresentationController@change_YT_Link')->name('change_YT_Link');
    Route::put('/admin/accueil/info', 'PresentationController@change_info_jeu')->name('change_info_jeu');
    Route::post('/admin/accueil/paragraphe', 'PresentationController@ajout_paragraphe')->name('ajout_paragraphe_info');



    Route::get('/admin/galerie', 'AdminController@admin_Galerie')->name('admin_Galerie');
    Route::post('/admin/galerie', 'GalerieController@ajout_img')->name('ajout_img');
    Route::delete('/admin/galerie', 'GalerieController@suppr_img')->name('suppr_img');

    Route::get('/admin/blog', 'AdminController@admin_Blog')->name('admin_Blog');
    Route::post('/admin/blog', 'BlogController@ajout_new')->name('ajout_new');
    Route::post('/admin/blog/paragraphe', 'BlogController@ajout_paragraphe')->name('ajout_paragraphe');
    Route::delete('/admin/blog', 'BlogController@suppr_new')->name('suppr_new');
    Route::post('/admin/blog/blague', 'BlogController@ajout_blague')->name('ajout_blague');
    Route::delete('/admin/blog/blague', 'BlogController@suppr_blague')->name('suppr_blague');


    Route::get('/admin/presskit', 'AdminController@admin_Presskit')->name('admin_Presskit');
    Route::put('/admin/presskit', 'PresentationController@change_YT_Link_presskit')->name('change_YT_Link_presskit');
    Route::put('/admin/presskit/info', 'PresskitController@change_info')->name('change_info');
    Route::post('/admin/presskit/info_principale', 'PresskitController@ajout_info_principale')->name('ajout_info_principale');
    Route::delete('/admin/presskit/info_principale', 'PresskitController@suppr_info_principale')->name('suppr_info_principale');
    Route::put('/admin/presskit/QNS', 'PresentationController@change_QNS')->name('change_QNS');
    Route::post('/admin/presskit', 'PresskitController@ajout_feature')->name('ajout_feature');
    Route::delete('/admin/presskit', 'PresskitController@suppr_feature')->name('suppr_feature');
    Route::post('/admin/presskit/a_venir', 'PresskitController@ajout_a_venir')->name('ajout_a_venir');
    Route::delete('/admin/presskit/a_venir', 'PresskitController@suppr_a_venir')->name('suppr_a_venir');
    Route::post('/admin/presskit/opdn', 'PresskitController@ajout_opdn')->name('ajout_opdn');
    Route::delete('/admin/presskit/opdn', 'PresskitController@suppr_opdn')->name('suppr_opdn');

    Route::delete('/blog', 'BlogController@suppr_commentaire_unique')->name('suppr_commentaire_unique');
    Route::delete('/blog/reponse', 'BlogController@suppr_reponse_unique')->name('suppr_reponse_unique');

    Route::get('/admin/phasetest', 'AdminController@admin_phasetest')->name('admin_phasetest');


});
