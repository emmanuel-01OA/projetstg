<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataActiviteController;
use App\Http\Controllers\FonctionPersController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PassationActController;
use App\Http\Controllers\StatutPerController;
use App\Http\Controllers\ActiviteUserController;
use App\Http\Controllers\CongesController;
use App\Http\Controllers\ActivitesManagerController;
use App\Http\Controllers\AttributionBackupController;
use App\Http\Controllers\DataCongesController;
use App\Http\Controllers\TempsCritiqueActivitesController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|


Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('/', [AuthController::class, 'login'])->name('login');

Route::post('/',[AuthController::class, 'handlerLogin'])->name('handlerLogin');



Route::middleware('auth')->group(function(){

    //Route::get('logout', [AuthController::class, 'logout']);

  //  Route::get('/dashboard-admin', [AppController::class, 'index'])->name('dashboard');
   // Route::get('logout', [AuthController::class, 'logout']);

   // Route::get('/dashboard-user', [AppController::class, 'user'])->name('dashboarduser');
   // Route::get('/dashboard-manager', [AppController::class, 'index'])->name('dashboardman');

});

Route::prefix('personnel')->group(function () {

    Route::get('/', [PersonnelController::class, 'index'])->name('personnel.index');

    Route::get('/create', [PersonnelController::class, 'create'])->name('personnel.create');

    Route::get('/edite/{personnel}', [PersonnelController::class, 'edite'])->name('personnel.edite');


});


Route::prefix('statut-personnel')->group(function () {

    Route::get('/', [StatutPerController::class, 'allstatut'])->name('statutpers.allstatut');

    Route::get('/create', [StatutPerController::class, 'createStatutpers'])->name('statutpers.create');

    Route::post('/create', [StatutPerController::class, 'store'])->name('statutpers.store');

    Route::get('/edite/{statut}', [StatutPerController::class, 'edite'])->name('statutpers.edite');


});

Route::prefix('fonction-personnel')->group(function () {

    Route::get('/', [FonctionPersController::class, 'allfonction'])->name('fonction.allfonction');

    Route::get('/create', [FonctionPersController::class, 'create' ])->name('fonction.create');

    Route::post('/create', [FonctionPersController::class, 'store' ])->name('fonction.store');


    Route::get('/edite/{fonction}', [FonctionPersController::class, 'edite'])->name('fonction.edite');


});

// Route::get('/admin/dashboard',[AppController::class,'dashboard'])->name('admin.dashboard');

// Route::get('/agent/dashboard',[AppController::class,'dashboard'])->name('agent.dashboard');



////////////////////////////////////////////////////////////////

Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/dashboard', [AppController::class, 'user'])->name('dashboarduser');

    Route::get('logout', [AuthController::class, 'logout']);

});


/// route pour les utilisateurs ing , Analyste de test

Route::prefix('activite/mes-activites')->group(function () {

    Route::get('/', [ActiviteUserController::class, 'indexMesactivites'])->name('mesactivites.index');

    Route::get('/create', [ActiviteUserController::class, 'create'])->name('mesactivites.create');

    Route::post('/create', [ActiviteUserController::class, 'postMesActivites'])->name('mesactivites.poste');


    Route::get('/edite/{mesActivites}', [ActiviteUserController::class, 'edite'])->name('mesactivites.edite');

    Route::put('/edite/{mesActivite}', [ActiviteUserController::class, 'edite'])->name('mesactivites.put');

    Route::get('/getdataActivites', [DataActiviteController::class, 'indexDataAct'])->name('DataActivite.index');




});


Route::prefix('activite/mes-passations')->group(function () {

    Route::get('/', [PassationActController::class, 'indexMespassations'])->name('mespassations.index');

    Route::get('/create', [PassationActController::class, 'createuserPassation'])->name('mespassation.create');

    Route::post('/create', [PassationActController::class, 'postuserPassation'])->name('mespassation.post');

    Route::get('/edite/{passation}', [PassationActController::class, 'edite'])->name('mespassation.edite');


});


Route::prefix('activite/activites-passations')->group(function () {

    Route::get('/', [PassationActController::class, 'indexMesActivitespassation'])->name('mesActivitespassations.index');

    Route::get('/create', [PassationActController::class, 'create'])->name('mesActpassation.create');

    Route::get('/edite/{passation}', [PassationActController::class, 'edite'])->name('mespassation.edite');

    Route::put('/updatevalb/{id}', [PassationActController::class, 'AccepterPassationback'])->name('mespassationback.valid');

    Route::put('/updaterefb/{id}', [PassationActController::class, 'RefuserPassationback'])->name('mespassationback.refus');



});



Route::prefix('activite/mes-conges')->group(function () {

    Route::get('/', [CongesController::class, 'indexconges'])->name('mesconges.index');

    Route::post('/create', [CongesController::class, 'planifcongescreate'])->name('mesplanificationconge.store');

    Route::get('/create', [CongesController::class, 'congescreate'])->name('mescongesuser.create');

    Route::get('/edite/{conges}', [CongesController::class, 'edite'])->name('mesconges.edite');

   });




////
// fin route pour les ingenieurs de test, Analyste de test
///////////////////////////////////////////////////////////////////

/*

route pour les admin

*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/dashboard-admin', [AppController::class, 'index'])->name('dashboard');

    Route::get('logout', [AuthController::class, 'logout']);
});


// FIN route Admin
////////////////////////////////////////

/*route pour les manager
*/


Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/dashboard-manager', [AppController::class, 'managerHome'])->name('dashboardman');

    Route::get('logout', [AuthController::class, 'logout']);

});


// validation des passations du personnel IT , AT

Route::prefix('activite/demande-activites-passations')->group(function () {

    Route::get('/', [PassationActController::class, 'indexDemandepassation'])->name('demandeManpassation.index');

    Route::get('/create', [PassationActController::class, 'create'])->name('mespassationman.create');

   // Route::get('/edite/{passation}', [PassationActController::class, 'edite'])->name('mespassation.edite');

   // accepter et refuser les demandes passationsdu coté du manager
    Route::put('/updateval/{id}', [PassationActController::class, 'AccepterPassationMan'])->name('mespassationman.valid');

    Route::put('/updateref/{id}', [PassationActController::class, 'RefuserPassationMan'])->name('mespassationman.refus');


});


Route::prefix('conges/conges-personnel')->group(function () {

    Route::get('/', [CongesController::class, 'indexCongespersonnel'])->name('Congespersonnel.index');

    Route::get('/create', [CongesController::class, 'create'])->name('mesCongespersman.create');

    Route::get('/edite/{passation}', [CongesController::class, 'edite'])->name('mespassation.edite');

});

// demande conges du personnel

Route::prefix('conges/demandes-conges-personnel')->group(function () {

    Route::get('/', [CongesController::class, 'indexDemCongespersonnel'])->name('DemCongespersonnel.index');

    Route::get('/create', [CongesController::class, 'create'])->name('demande-Congespersman.create');

    Route::get('/edite/{passation}', [CongesController::class, 'edite'])->name('demande-mespassation.edite');

});

// route pour les activites

Route::prefix('activite/Les-activites')->group(function () {

    Route::get('/', [ActivitesManagerController::class, 'indexLesactivites'])->name('LesActivites.index');

    Route::get('/create', [ActivitesManagerController::class, 'Actcreate'])->name('LesActivites.create');

    Route::post('/create', [ActivitesManagerController::class, 'CreateActivite'])->name('LesActivites.create');


    Route::get('/edite/{activites}', [ActivitesManagerController::class, 'edite'])->name('LesActivites.edite');

});





Route::prefix('activite/Temps-critiques-activites')->group(function () {

    Route::get('/', [TempsCritiqueActivitesController::class, 'indexTempsCritiqueactivites'])->name('TempsCritiqActivites.index');

    Route::get('/create', [TempsCritiqueActivitesController::class, 'TempsCritiqActivitescreat'])->name('TempsCritiqActivites.create');

    Route::post('/create', [TempsCritiqueActivitesController::class, 'TempsCritiqActivitescreate'])->name('TempsCritiqActivites.store');

    Route::get('/activites/{activity}', [TempsCritiqueActivitesController::class, 'DetailActiviteSelect'])->name('activities.showAjax');

    Route::get('/edite/{activites}', [TempsCritiqueActivitesController::class, 'TempsCritiqActivitesedite'])->name('TempsCritiqActivites.edite');

});


Route::prefix('activite/Type-activites')->group(function () {

    Route::get('/', [ActivitesManagerController::class, 'indexTypeActiviteman'])->name('TypeActiviteman.index');

    Route::get('/create', [ActivitesManagerController::class, 'TypeActivitemanCreate'])->name('TypeActiviteman.create');

    Route::get('/edite/{activites}', [ActivitesManagerController::class, 'TypeActivitemanEdit'])->name('TypeActiviteman.edite');

});

Route::prefix('activite/Attrib-backup')->group(function () {

    Route::get('/', [AttributionBackupController::class, 'indexAttributionbackup'])->name('Attributionbackup.index');

    Route::get('/create', [AttributionBackupController::class, 'attribbackcreat'])->name('Attributionbackup.create');

    Route::post('/create', [AttributionBackupController::class, 'AttributionbackupStore'])->name('Attributionbackup.store');

    Route::get('/edite/{activites}', [AttributionBackupController::class, 'AttributionbackupEdit'])->name('Attributionbackup.edite');

});



Route::prefix('activite/VisualisationConges')->group(function () {

    Route::get('/', [DataCongesController::class, 'indexVisualisationConges'])->name('VisualisationConges.index');

});

Route::prefix('activite/VisualisationActivites')->group(function () {

    Route::get('/', [DataActiviteController::class, 'indexVisualisationActivites'])->name('VisualisationActivites.index');

});












// Fin route pour les conges
////////////////////////////



