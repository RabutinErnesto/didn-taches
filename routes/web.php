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
    return view('auth.login');
});

Auth::routes();

Route::namespace('admin')->middleware('can:manage-users')->group(function()
{
    Route::resource('users', 'UsersController');
});

Route::get('/edit_mdp', 'editMdpController@index')->name('edit_mdp');
Route::post('/change-password', 'editMdpController@change')->name('password.change');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/a-propos', 'AproposControlleur@index')->name('apropos');


Route::get('taches/undone', 'TacheControlleur@undone')->name('taches.undone');
Route::get('taches/done', 'TacheControlleur@done')->name('taches.done');
Route::get('taches/create', 'TacheControlleur@create')->name('taches.create');
Route::put('taches/makedone/{tache}', 'TacheControlleur@makedone')->name('taches.makedone');
Route::put('taches/makeundone/{tache}', 'TacheControlleur@makeundone')->name('taches.makeundone');
Route::get('taches/{tache}/affectedto/{user}', 'TacheControlleur@affectedto')->name('taches.affectedto');


Route::resource('taches', 'TacheControlleur');

Route::resource('fiches', 'FichesController');
Route::get('fiche-generate-pdf/{id}','FichesController@pdf')->name('fiche-pdf');
Route::get('fiche-vide-pdf','FichesController@fiche_vide')->name('fiche-vide');

Route::resource('activites', 'ActivitesController');
Route::get('activite-generate-pdf/{id}','ActivitesController@pdf')->name('pdf');
Route::get('test','ActivitesController@test')->name('test');

