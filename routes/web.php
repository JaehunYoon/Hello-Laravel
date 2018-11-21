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

Route::get('/', 'IndexController@index');

Route::get('/hello', function ()
{
    $greeting = '안녕하세요';
    $name = 'h4lo';

    return view('Example.DataBinding.hello', compact('greeting', 'name'));
});

Route::get('/blade/101/', function ()
{
    $items = ['Apple', 'Banana'];
    $itemCount = "2";
    $exam = "I love Laravel!!";

    return view('Example.101.blade101', compact('items', 'exam', 'itemCount'));
});

Route::get('/blade/201/master', function ()
{
   return view('Example.201.master');
});

Route::get('/blade/201/', function ()
{
    return view('Example.201.blade201');
});

Route::resource('posts', 'PostsController');

Route::get('posts', [
    'as' => 'posts.index',
    'uses' => 'PostsController@index'
]);

Route::resource('posts.comments', 'PostCommentController');

/*
    * Named Route
    - Closure

    Route::get('posts', [
        'as' => 'posts.index',
        function() {
            return view('posts.index');
        }
    ]);
*/

// Authentication Example

/*
Route::get('auth', function () {
   $credentials = [
       'email' => 'foo@bar.com',
       'password' => 'password'
   ];

   if (!Auth::attempt($credentials)) {
       return '아이디와 비밀번호가 일치하지 않습니다.';
   }

   return redirect('protected');
});

Route::get('auth/login', ['as' => 'login', function () {
    return "Hello~~ It's Login Page~~~";
    }
]);

Route::get('auth/logout', function () {
   Auth::logout();

   return 'Bye~~';
});

Route::get('protected', [
   'middleware' => 'auth',
    function () {
        return 'Welcome back, ' . Auth::user()->name;
    }
]);
*/

// Authentication

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*

- Route::[Method]('[Resource', function() {[this is call back function]});
 -> Method : get, post, put, delete

*/

// Return HTTP Exception

/*
return abort(HTTP response status code value)
ex) return abort(404)
    -> show 404 page
*/
