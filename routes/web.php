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

Route::get('/hello', function ()
{
    $greeting = '안녕하세요';
    $name = 'h4lo';

    return view('hello', compact('greeting', 'name'));
});

Route::get('/blade/101', function ()
{
    $items = ['Apple', 'Banana'];
    $itemCount = "2";
    $exam = "I love Laravel!!";

    return view('blade101', compact('items', 'exam', 'itemCount'));
});

Route::get('/blade/201', function ()
{
   return view('blade201');
});

/*

- Route::[Method]('[Resource', function() {[this is call back function]});
 -> Method : get, post, put, delete

*/
