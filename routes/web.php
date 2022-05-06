<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MoncompteController;

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


require __DIR__.'/auth.php';

// mes ajouts
Route::get("/moncompte",[MoncompteController::class,'index'])->name('moncompte');
Route::get("/panier",[MoncompteController::class, 'panier'])->name('panier');

// routes administration
Route::get("/admin",[DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');

//route qui permet de lister les utilisateurs dans l'admin
Route::get("/admin/user",[UserController::class,'index'])->middleware(['auth'])->name('admin-user');

// route qui permet de lister les actualites
Route::get("/admin/actu-lister",[ActuController::class,'index'])->middleware(['auth'])->name('admin-actu-lister');

//route qui permet d'ajouter les actus
Route::get("/admin/actu-editer",[ActuController::class,'editer'])->middleware(['auth'])->name('admin-actu-editer');
// route qui permet de poster via formulaire pour ajouter
Route::post("/admin/actu-editer",[ActuController::class,'create'])->middleware(['auth'])->name('admin-actu-ajouter');



//Route qui permet de modifier les actus
Route::get("/admin/actu-editer/{actu}",[ActuController::class,'editer'])->middleware(['auth'])->name('admin-actu-modifier');
//Route qui permet de postser via formulaire pour modifier
Route::post("/admin/actu-editer/{actu}",[ActuController::class,'update'])->middleware(['auth'])->name('admin-actu-modifier');



//Route qui permet de supprimer les actus
Route::get("/admin/actu-supprimer/{actu}",[ActuController::class,'delete'])->middleware(['auth'])->name('admin-actu-delete');


//route client

Route::get("/client",[NewsController::class,'index'])->name('actu-client');
Route::get("/client/detail/{actu}",[NewsController::class,'detail'])->name('actu-detail');



// route qui permet la gestion des droits administrateur
Route::get("/admin/user/right/{user}",[UserController::class,'manageRight'])->middleware(['auth'])->name('admin-user-right');
