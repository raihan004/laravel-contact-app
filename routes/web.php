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

Route::get('/', 'ContactsController@index');

Route::get('/lv',function(){
    // $laravel = app();
    // return "Your laravel application version is : " . $laravel::VERSION;

    echo public_path();
    echo "<br>";
    echo base_path();
    echo "<br>";    
    //Path to the 'app/storage' folder
    echo storage_path();
    echo "<br>";
    echo config('uploads.path.full_path');    
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/contacts','ContactsController');