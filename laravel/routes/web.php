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
    //return 'Hello World!';
});

//基础路由 get,post
Route::get('basic_get', function () {
    return 'Hello World! basic_get';
});

Route::post('basic_post', function () {
    return 'Hello World! basic_post';
});

//多请求路由 match,any
Route::match(['get', 'post'], 'multy_match', function () {
    return 'Hello World! multy_match';
});

Route::any('multy_any', function () {
    return 'Hello World! multy_any';
});

//路由参数 参数 可选参数 默认值
Route::get('user/{id}', function ($id) {
    return 'Hello World! User-id-' . $id ;
});