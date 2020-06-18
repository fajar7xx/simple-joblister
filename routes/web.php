<?php

use App\Mail\NewUserWelcomeMail;
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

// Route::get('/', function () {
//     return view('site.home');
// });
// admin test
Route::get('/admin', 'Admin\DashboardController');


Route::get('/', 'SiteController@index');
Route::get('contact', 'ContactController@index')->name('contact.index');
Route::post('contact', 'ContactController@store')->name('contact.store');
Route::get('job/{slug}', 'JobController@show')->name('job.show');



// autentikasi
Route::group(['middleware' => ['auth', 'verified']], function(){
    Route::resource('profile', 'ProfileController');
    Route::get('job', 'JobController@create')->name('job.create');
    Route::post('job', 'JobController@store')->name('job.store');

    Route::get('applyjob/{url}', 'ProposalController@create')->name('apply.job');
    Route::post('applyjob', 'ProposalController@store')->name('apply.job.store');
    Route::get('proposal/{id}', 'ProposalController@show')->name('proposal.show');
});

Auth::routes(['verify' => true]);

Route::get('email', function(){
    return new NewUserWelcomeMail();
});

// Route::get('/home', 'HomeController@index')->name('home');
