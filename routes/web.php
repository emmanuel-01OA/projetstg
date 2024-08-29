<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FonctionPersController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PassationActController;
use App\Http\Controllers\StatutPerController;
use App\Http\Controllers\ActiviteUserController;
use App\Http\Controllers\CongesController;
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

    Route::get('/create', [FonctionPersController::class, 'create'])->name('fonction.create');

    Route::post('/create', [FonctionPersController::class, 'store'])->name('fonction.store');

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

    Route::get('/edite/{mesActivites}', [ActiviteUserController::class, 'edite'])->name('mesactivites.edite');


});


Route::prefix('activite/mes-passations')->group(function () {

    Route::get('/', [PassationActController::class, 'indexMespassations'])->name('mespassations.index');

    Route::get('/create', [PassationActController::class, 'createuserPassation'])->name('mespassation.create');

    Route::get('/edite/{passation}', [PassationActController::class, 'edite'])->name('mespassation.edite');


});

Route::prefix('activite/activites-passations')->group(function () {

    Route::get('/', [PassationActController::class, 'indexMesActivitespassation'])->name('mesActivitespassations.index');

    Route::get('/create', [PassationActController::class, 'create'])->name('mesActpassation.create');

    Route::get('/edite/{passation}', [PassationActController::class, 'edite'])->name('mespassation.edite');

});



Route::prefix('activite/mes-conges')->group(function () {

    Route::get('/', [CongesController::class, 'indexconges'])->name('mesconges.index');

    Route::get('/create', [CongesController::class, 'create'])->name('mesconges.create');

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
   // Route::get('/admin/home', [AppController::class, 'adminHome'])->name('admin.home');

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


// validation des passations

Route::prefix('activite/demande-activites-passations')->group(function () {

    Route::get('/', [PassationActController::class, 'indexDemandepassation'])->name('demandeManpassation.index');

    Route::get('/create', [PassationActController::class, 'create'])->name('mespassationman.create');

    Route::get('/edite/{passation}', [PassationActController::class, 'edite'])->name('mespassation.edite');

});


Route::prefix('activite/conges-personnel')->group(function () {

    Route::get('/', [CongesController::class, 'indexCongespersonnel'])->name('Congespersonnel.index');

    Route::get('/create', [CongesController::class, 'create'])->name('mesCongespersman.create');

    Route::get('/edite/{passation}', [CongesController::class, 'edite'])->name('mespassation.edite');

});






// Fin route pour les conges
////////////////////////////



