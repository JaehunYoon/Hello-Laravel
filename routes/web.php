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

Route::get('err_404', function()
{
    return abort(404);
});

Route::get('err_500', function()
{
    return abort(500);
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
