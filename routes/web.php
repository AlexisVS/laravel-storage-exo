<?php

use App\Http\Controllers\FichierController;
use App\Models\Fichier;
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
    $fichiers = Fichier::all();
    return view('frontend.home', compact('fichiers'));
});

Route::get('/backend', function () {
    $fichiers = Fichier::all();
    return view('backend.home', compact('fichiers'));
});

route::resource("backend/fichier", FichierController::class);
route::get('backend/fichier/{fichier}/download', [FichierController::class, "download"])->name("fichier.download");