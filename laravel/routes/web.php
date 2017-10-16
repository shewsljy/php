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

//基础路由
Route::get('/', function () {
    return view('welcome');
    //return 'Hello World!';
});

Route::get('basic1', function () {
    return 'Hello World! get';
});

Route::post('basic2', function () {
    return 'Hello World! post';
});

//多请求路由
Route::match(['get', 'post'], 'multy_macth', function () {
    return 'Hello World! multy_macth';
});

Route::any('multy_any', function () {
    return 'Hello World! multy_any';
});

//路由参数
Route::any('user/{id}', function ($id) {
    return 'Hello World! User-id-' . $id ;
});

Route::any('user/{name?}', function ($name = 'jiayu') {
    return 'Hello World! User-name-' . $name ;
});