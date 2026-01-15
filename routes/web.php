<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;



use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\MissionController as AdminMission;
use App\Http\Controllers\Admin\PaiementController as AdminPaiement;
use App\Http\Controllers\Admin\OffreController as AdminOffre;



use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\Client\OffreController as ClientOffre;
use App\Http\Controllers\Client\ConclusionControlleur as ClientConclusion;
use App\Http\Controllers\Client\PaiementController as ClientPaiement;
use App\Http\Controllers\Client\MissionController as ClientMission;
use App\Http\Controllers\ExecutantDashboardController;
use App\Http\Controllers\Executant\MissionController;
use App\Http\Controllers\Executant\OffreController as ExecutantOffre;
use App\Http\Controllers\Executant\ConclusionControlleur as ExecutantConclusion;
use App\Http\Controllers\Executant\PaiementController as ExecutantPaiement;

/* ================= ROUTE ACCUEILL ================= */

Route::get('/', [WelcomeController::class,'index'])->name('welcome.index');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/* ================= ROUTE ADMIN ================= */
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('missions', AdminMission::class)->except('create','store');
    Route::resource('offres', AdminOffre::class)->only('index','show','destroy');
    Route::resource('paiements',AdminPaiement::class);
});


/* ================= ROUTE CLIENT ================= */
Route::middleware(['auth','client'])->prefix('client')->name('client.')->group(function () {
    Route::get('/dashboard',[ClientDashboardController::class,'index'])->name('dashboard');
    Route::resource('/missions', ClientMission::class);
    Route::get('/offres',[ClientOffre::class,'index'])->name('offres.index');
    Route::get('/offres/{offre}',[ClientOffre::class,'show'])->name('offres.show');
    Route::post('/offres/{offre}/accepter',[ClientOffre::class,'accepter'])->name('offres.accepter');
    Route::get('/paiement/{paiement}',[ClientPaiement::class,'show'])->name('paiements.show');
    Route::get('/paiement',[ClientPaiement::class,'index'])->name('paiements.index');
    Route::post('/conclusion/{mission}/valider',[ClientConclusion::class,'valider'])->name('mission.valider');
});
 

/* ================= ROUTE EXECUTANT ================= */
Route::middleware(['auth', 'executant'])->prefix('executant')->name('executant.')->group(function () {
    Route::get('/dashboard', [ExecutantDashboardController::class, 'index'])->name('dashboard');
    Route::resource('offres',ExecutantOffre::class)->except('create');
    Route::get('offres/create/{mission}',[ExecutantOffre::class,'create'])->name('offres.create');
    Route::get('mission-dispo',[ExecutantOffre::class,'dispo'])->name('missions.disponibles');
    Route::get('mission-soumi',[MissionController::class,'indexDisponible'])->name('missions.offres');
    Route::get('mission-show/{offre}',[MissionController::class,'show'])->name('missions.show');
    Route::get('/executant/paiement',[ExecutantPaiement::class,'index'])->name('paiements.index');
    Route::get('/paiement/{paiement}',[ExecutantPaiement::class,'show'])->name('paiements.show');
    Route::post('conclusion/{mission}/terminer',[ExecutantConclusion::class,'terminer'])->name('mission.terminer');
});

require __DIR__.'/auth.php';
