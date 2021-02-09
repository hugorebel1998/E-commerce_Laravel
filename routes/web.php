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
    if (Auth::check()) {
        return redirect(route('home'));
    } else {
        return view('auth.login');
    }

});


Auth::routes(['register' => false]);
Route::match(['get', 'post'], 'register', function () {
    return redirect('/');
});

Route::get('/home', 'HomeController@index')->name('home');

//Tienda
Route::get('/plantilla/tienda', 'HomeController@tienda')->name('plantilla.tienda')->middleware('auth');

//Categorias
Route::get('/categoria/index', 'CategoryController@index')->name('categoria.index')->middleware('auth');
Route::get('/categoria/create', 'CategoryController@create')->name('categoria.create')->middleware('auth');
Route::post('/categoria/store', 'CategoryController@store')->name('categoria.store')->middleware('auth');
Route::get('/categoria/show/{categori}', 'CategoryController@show')->name('categoria.show')->middleware('auth');
Route::get('/categoria/edit/{categori}', 'CategoryController@edit')->name('categoria.edit')->middleware('auth');
Route::post('/categoria/update/{categori}', 'CategoryController@update')->name('categoria.update')->middleware('auth');
Route::get('/categoria/delete/{categori}', 'CategoryController@delete')->name('categoria.delete')->middleware('auth');

//Productos
Route::get('/producto/index', 'ProductController@index')->name('producto.index')->middleware('auth');
Route::get('/producto/create','ProductController@create')->name('producto.create')->middleware('auth');
Route::post('/producto/store', 'ProductController@store')->name('producto.store')->middleware('auth');

