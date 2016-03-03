<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::get('/', 'Saf\DashboardController@index');

    Route::get('/pessoas/cadastrar', 'Saf\PessoaController@getCreate');
    Route::post('/pessoas/cadastrar', 'Saf\PessoaController@postCreate');

    Route::get('/associados', 'Saf\PessoaController@getPessoas');
    Route::get('/doadores', 'Saf\PessoaController@getPessoas');
    Route::get('/clubedolivro', 'Saf\PessoaController@getPessoas');
    Route::get('/prestadores', 'Saf\PessoaController@getPessoas');

    Route::get('/user/edit', 'Auth\UserController@getEdit');
    Route::post('/user/edit', ['as' => 'user.update', 'uses' => 'Auth\UserController@update']);
    Route::get('/user/password/change', 'Auth\UserController@getPasswordForm');
    Route::post('/user/password/change', ['as' => 'user.reset', 'uses' => 'Auth\UserController@resetPassword']);

    //Route::get('/', 'HomeController@index');
});
