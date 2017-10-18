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

//路由视图
Route::get('view', function () {
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

//路由参数
Route::get('user_id/{id}', function ($id) {
    return 'Hello World! User-id-' . $id ;
});

//路由可选参数 设置默认值
Route::get('user_name/{name?}', function ($name = null) {
    return 'Hello World! User-name-' . $name ;
});

//路由参数 参数由表达式限制
Route::get('user_age/{age}', function ($age) {
    return 'Hello World! User-age-' . $age ;
})->where('age', '[0-9]+');

//路由多参数 各个参数由表达式限制
Route::get('user/{id}/{name}', function ($id, $name) {
    return 'Hello World! User-id-' . $id . ', User-name-' . $name ;
})->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);

//路由别名
Route::get('user_center', ['as' => 'center', function () {
    //return 'Hello World! User-center';
    return route('center');
}]);

//路由群组 路由前置，放置在里面的路由要加上相应的前置
Route::group(['prefix' => 'member'], function () {
    //路由多参数 各个参数由表达式限制
    Route::get('user/{id}/{name}', function ($id, $name) {
        return 'Route prefix! User-id-' . $id . ', User-name-' . $name ;
    })->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);

    //路由别名
    Route::get('user_center', ['as' => 'prefix_center', function () {
        //return 'Route prefix!';
        return route('prefix_center');
    }]);
});

//路由绑定控制器 方式一
Route::get('member/info_one', 'MemberController@info_one');

//路由绑定控制器 方式二
Route::get('member/info_two', ['uses' => 'MemberController@info_two']);

//路由绑定控制器 方式二 设置路由别名
Route::get('member/info_alias', ['uses' => 'MemberController@info_alias', 'as' => 'memberinfo']);

//路由绑定控制器 方式二 参数表达式
Route::get('member/{id}', ['uses' => 'MemberController@info_id'])->where('id', '[0-9]+');

//路由绑定控制器 方式二 视图
Route::get('member/view_info', ['uses' => 'MemberController@info_view']);

//路由绑定控制器 方式二 默认视图
Route::get('member/view_blade', ['uses' => 'MemberController@info_view_blade']);

//路由绑定控制器 方式二 模型
Route::get('member/model', ['uses' => 'MemberController@model']);
