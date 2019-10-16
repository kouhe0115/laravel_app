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
        return view('wel');
    });
    
    Route::resource('todo', 'TodoController');
    
    //Route::get('/', 'TodoController@index')->name('todo.index');

    //resource - CRUDルーティングを一度に行える
    //     Name             URI                  Methed
    //sample.index      /samples                  GET
    //      .create     /samples/create           GET
    //      .store      /samples                  POST
    //      .show       /samples/{sample}         GET
    //      .edit       /samples/{sample}/edit    GET
    //      .update     /samples/{sample}         PUT/PATCH
    //      .destroy    /samples/{sample}         DELETE
    
    //URI - ドメイン以下を指す
    //Name - URIを使用する際、Nameを使用すれば対象のアクションのメソッドが使用される
    //Middleware - HTTPリクエストの処理の前後に処理を入れる
