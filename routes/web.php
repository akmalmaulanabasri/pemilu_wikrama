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

Route::get('/', function () {
    return view('auth.login');
})->name('welcome');

Auth::routes(['register' => false, 'reset' => false]);

Route::group(['middleware' => 'auth'], function() {
    Route::get('home', 'HomeController@index')->name('home');

    Route::resource('vote', 'VoteController')->only(['index', 'store'])->middleware('vote');

    Route::group(['middleware' => 'admin'], function() {
        Route::resource('users', 'UserController')->except(['create', 'show']);
        Route::resource('rayon', 'RayonController')->except(['create', 'show']);
    });
});

Route::get('report', 'ReportController@index')->name('report.index');

Route::get('vote/guru', 'VoteController@indexguru')->name('vote.indexguru');

Route::get('report/chart', 'ReportController@chart')->name('report.chart');
Route::resource('candidates', 'CandidateController')->except(['create']);
Route::get('selesai', 'SelesaiController@index');