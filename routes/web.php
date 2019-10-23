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
    
//  Route::getでファサードを使用して、get,resourceメソッドを呼び出している
//  第一引数でパスの指定

//  resource - CRUDルーティングを一度に行える
//  URI - ドメイン以下を指す
//  Name - URIを使用する際、Nameを使用すれば対象のアクションのメソッドが使用される
//  Middleware - HTTPリクエストの処理の前後に処理を入れる
