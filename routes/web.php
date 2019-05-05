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
    return view('welcome');
});

//Rotas publicas
Route::get('/noticias/index', 'NoticiasController@index')
    ->name('noticias.index');
Route::get('/noticias/show/{publication}', 'NoticiasController@show')
    ->name('noticias.show');
Route::name('noticias.thumb_small_asset')
    ->get('noticias/{publication}/thumb_small_asset', 'NoticiasController@thumbSmallAsset');
Route::name('noticias.thumb_asset')
    ->get('noticias/{publication}/thumb_asset', 'NoticiasController@thumbAsset');




//Rotas de recuperação de senha
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')
    ->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')
    ->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')
    ->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')
    ->name('password.update');

Route::get('email-verification/error', 'EmailVerificationController@getVerification')
    ->name('email-verification.error');
Route::get('email-verification/check/{token}', 'EmailVerificationController@getVerification')
    ->name('email-verification.check');

//Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin\\'
    ], function(){
    Route::name('login')->get('login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login');

    Route::group(['middleware' => ['isVerified', 'can:admin']], function (){
        Route::name('logout')->post('logout', 'Auth\LoginController@logout');
        Route::get('index', function (){
           return view('admin.index');
        });

        Route::resource('users', 'UsersController');
        Route::resource('categories', 'CategoriesController');
        Route::resource('eventos', 'EventosController');
        Route::name('publications.thumb_small_asset')
            ->get('publications/{publication}/thumb_small_asset', 'PublicationsController@thumbSmallAsset');
        Route::name('publications.thumb_asset')
            ->get('publications/{publication}/thumb_asset', 'PublicationsController@thumbAsset');
        Route::resource('publications', 'PublicationsController');
    });

});
