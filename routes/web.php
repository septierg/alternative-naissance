<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

Route::group(['middleware' => 'admin'], function () {


//list of resources routes
Route::resources([
    'membre' => \App\Http\Controllers\MembreController::class,
    'accompagnantes' => \App\Http\Controllers\AccompagnanteController::class,
    'accompagnement'  => \App\Http\Controllers\AccompagnementController::class,
    'clsc'  => \App\Http\Controllers\ClscController::class,
    'statut_citoyen'  => \App\Http\Controllers\StatusCitoyenController::class,
    'source_revenu'  => \App\Http\Controllers\SourceRevenuController::class,
    'accouchement_personnes_prevues' => \App\Http\Controllers\AccouchementPersonnesPrevuesController::class,
    'soignants' => \App\Http\Controllers\SoignantsController::class,
    'attentes'  => \App\Http\Controllers\AttentesController::class,
    'preoccupations_grossesse'  => \App\Http\Controllers\PreoccupationsGrossesseController::class,
    'preoccupations_bebe'  => \App\Http\Controllers\PreoccupationsBebeController::class,
    'preoccupations_accouchement'  => \App\Http\Controllers\PreoccupationsAccouchementController::class,
    'source_diffusion'  => \App\Http\Controllers\SourceDiffusionController::class,
    'prerequis'  => \App\Http\Controllers\PrerequisController::class,
    'lieux_formation'  => \App\Http\Controllers\LieuxFormationController::class,
    'references_donnees'  => \App\Http\Controllers\ReferenceDonneesController::class,
    'cercle_familial'  => \App\Http\Controllers\CercleFamilialController::class,
    'statut_membre'  => \App\Http\Controllers\StatutMembreController::class,
    'statut_accompagnante' => \App\Http\Controllers\StatutAccompagnantesController::class,
]);

Route::get('admin/membre', [App\Http\Controllers\MembreController::class, 'index'])->name('membre');
Route::get('admin/accompagnante', [App\Http\Controllers\AccompagnanteController::class, 'index'])->name('accompagnante');

//accompagnement
Route::resource('admin/accompagnement', 'App\Http\Controllers\AccompagnementController',['names' =>[
    'index' => 'accompagnement',
    'create' => 'accompagnement.create',
    'update' => 'accompagnement.update',
    'store' => 'accompagnement.store',
    'edit' => 'accompagnement.edit'
]]);

//relevaille
Route::resource('admin/relevaille', 'App\Http\Controllers\RelevailleController',['names' =>[
    'index' => 'relevaille',
    'create' => 'relevaille.create',
    'update' => 'relevaille.update',
    'store' => 'relevaille.store',
    'edit' => 'relevaille.edit'
]]);


//rencontre
Route::resource('admin/rencontre', 'App\Http\Controllers\RencontreController',['names' =>[
    'index' => 'rencontre',
    'create' => 'rencontre.create',
    'update' => 'rencontre.update',
    'store' => 'rencontre.store',
    'edit' => 'rencontre.edit'
]]);

//type_formations
Route::resource('admin/type_formation', 'App\Http\Controllers\TypeFormationController',['names' =>[
    'index' => 'type_formation',
    'create' => 'type_formation.create',
    'update' => 'type_formation.update',
    'store' => 'type_formation.store',
    'edit' => 'type_formation.edit'
]]);


//formations
Route::resource('admin/formation', 'App\Http\Controllers\FormationController',['names' =>[
    'index' => 'formation',
    'create' => 'formation.create',
    'update' => 'formation.update',
    'store' => 'formation.store',
    'edit' => 'formation.edit'
]]);

//inscriptions_formation
Route::get('admin/inscriptions_formations/{id}/{email}/edit_list_formation',['as' => 'inscriptions_formations.edit_list_formation','uses'=> 'App\Http\Controllers\InscriptionsFormationsController@edit_list_formation']);
Route::get('admin/inscriptions_formations/{id}/update_list_formation',['as' => 'inscriptions_formations.update_list_formation','uses'=> 'App\Http\Controllers\InscriptionsFormationsController@update_list_formation']);

Route::resource('admin/inscriptions_formations', 'App\Http\Controllers\InscriptionsFormationsController',['names' =>[
    'index' => 'inscriptions_formations',
    'create' => 'inscriptions_formations.create',
    'update' => 'inscriptions_formations.update',
    'store' => 'inscriptions_formations.store',
    'edit' => 'inscriptions_formations.edit'
]]);


//requettes
Route::get('admin/requetes/{table}/{fields}/create_dynamically',['as' => 'requetes.create_dynamically','uses'=> 'App\Http\Controllers\RequettesController@create_query_dynamically']);
Route::resource('admin/requetes', 'App\Http\Controllers\RequettesController',['names' =>[
    'index' => 'requetes',
    'create' => 'requetes.create',
    'update' => 'requetes.update',
    'store' => 'requetes.store',
    'edit' => 'requetes.edit'
]]);

//requetes favori
Route::get('admin/requetes_favori', ['as' => 'requetes.favori', 'uses' => 'App\Http\Controllers\RequettesFavoriController@index']);

//IMAGE
Route::get('/image', 'App\Http\Controllers\ImageController@index');
Route::post('/store', 'App\Http\Controllers\ImageController@store');



//Route::get('admin/accompagnement', [App\Http\Controllers\AccompagnementController::class, 'index'])->name('accompagnement');
Route::get('admin/accompagnement/{id}/edit', [App\Http\Controllers\AccompagnementController::class, 'edit']);
//Route::get('admin/accompagnement', [App\Http\Controllers\AccompagnementController::class, 'update'])->name('accompagnement.update');


Route::get('admin/clsc', [App\Http\Controllers\ClscController::class, 'index'])->name('clsc');
Route::get('admin/statut_citoyen', [App\Http\Controllers\StatusCitoyenController::class, 'index'])->name('statut_citoyen');
Route::get('admin/source_revenu', [App\Http\Controllers\SourceRevenuController::class, 'index'])->name('source_revenu');
Route::get('admin/accouchement_personnes_prevues', [App\Http\Controllers\AccouchementPersonnesPrevuesController::class, 'index'])->name('accouchement_personnes_prevues');
Route::get('admin/soignants', [App\Http\Controllers\SoignantsController::class, 'index'])->name('soignants');
Route::get('admin/attentes', [App\Http\Controllers\AttentesController::class, 'index'])->name('attentes');
Route::get('admin/preoccupations_grossesse', [App\Http\Controllers\PreoccupationsGrossesseController::class, 'index'])->name('preoccupations_grossesse');
Route::get('admin/preoccupations_bebe', [App\Http\Controllers\PreoccupationsBebeController::class, 'index'])->name('preoccupations_bebe');
Route::get('admin/preoccupations_accouchement', [App\Http\Controllers\PreoccupationsAccouchementController::class, 'index'])->name('preoccupations_accouchement');
Route::get('admin/source_diffusion', [App\Http\Controllers\SourceDiffusionController::class, 'index'])->name('source_diffusion');
Route::get('admin/prerequis', [App\Http\Controllers\PrerequisController::class, 'index'])->name('prerequis');
Route::get('admin/lieux_formation', [App\Http\Controllers\LieuxFormationController::class, 'index'])->name('lieux_formation');
Route::get('admin/references_donnees', [App\Http\Controllers\ReferenceDonneesController::class, 'index'])->name('references_donnees');
Route::get('admin/cercle_familial', [App\Http\Controllers\CercleFamilialController::class, 'index'])->name('cercle_familial');
Route::get('admin/statut_membre', [App\Http\Controllers\StatutMembreController::class, 'index'])->name('statut_membre');
Route::get('admin/statut_accompagnante', [App\Http\Controllers\StatutAccompagnantesController::class, 'index'])->name('statut_accompagnante');
});
