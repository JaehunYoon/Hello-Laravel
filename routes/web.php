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

Route::get('/', function ()
{
    return view('welcome');
});

Route::get('test', function()
{
    return "test is good!";
});

Route::get('err', function() # 이 라우팅은 errors 파일을 정상적으로 불러오지 못하기 때문에 오류가 발생한다.
{
    return view('errors'); # 없는데 어떻게 view 를 해요..
});

Route::get('/hello', function () {
    $greeting = '안녕하세요';
    $name = 'h4lo';

    return view('hello', compact('greeting', 'name'));
});
/*

- Route::[Method]('[Resource', function() {[this is call back function]});
 -> Method : get, post, put, delete

*/
