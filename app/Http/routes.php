<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    return view('welcome');
});
Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

//Route::group(['middleware' => 'oauth'], function() {

    //Com o uso do resources, ele irá pegar todos os nosso metodos principais
    //do nosso controller (ClientController), sem precisar digitar todas as rotas.
    Route::resource('client', 'ClientController', ['except' => ['create', 'edit']]);

    //Route::group(['middleware' => 'CheckProjectOwner'], function() {
    Route::resource('project', 'ProjectController', ['except' => ['create', 'edit']]);
    //});
    //O project tambem, basta fazer essa declaração, que não será preciso declarar
    //rota por rota.
    Route::group(['prefix' => 'project'], function () {


        Route::get('{id}/note', 'ProjectNoteController@index');
        Route::post('{id}/note/', 'ProjectNoteController@store');
        Route::get('{id}/note/{idNote}', 'ProjectNoteController@show');
        Route::delete('note/{id}', 'ProjectNoteController@destroy');
        
        Route::post('{id}/file', 'ProjectFileController@store');
    });
    /*
      Route::get('client', ['middleware' => 'oauth', 'uses' => 'ClientController@index']);
      Route::post('client', 'ClientController@store');
      Route::get('client/{id}', 'ClientController@show');
      Route::put('client/{id}', 'ClientController@update');
      Route::delete('client/{id}', 'ClientController@destroy');

      Route::get('project', 'ProjectController@index');
      Route::post('project', 'ProjectController@store');
      Route::get('project/{id}', 'ProjectController@show');
      Route::put('project/{id}', 'ProjectController@update');
      Route::delete('project/{id}', 'ProjectController@destroy');
     */
//});

