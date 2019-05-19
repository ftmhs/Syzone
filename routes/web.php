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
use Illuminate\Support\Facades\Input;
use App\User;

Route::get('/','PagesController@index');
Route::any('pages/search',function(){
    $q = Input::get ('q');
    if($q != ""){
        $user = User::where('name','LIKE','%'.$q.'%')
        ->orWhere('email','LIKE','%'.$q.'%')
        ->get();
        if(count($user) > 0) {
            return view('pages/search')->withDetails($user)->withQuery ( $q );
        }else {
            return view ('pages/search')->withMessage('No Details found. Try to search again !');
        }
    }else {
        return view ('pages/search');
    }
});

Route::resource('sites','SitesController');
Route::resource('clients','ClientsControler');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
