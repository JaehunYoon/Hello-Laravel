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

// Controller Route

//Route::resource('posts', 'PostsController');
//Route::resource('posts.comments', 'PostCommentController');

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

// Authentication

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Eager Loading

Route::get('posts', function () {
    DB::listen(function ($event) {
        var_dump($event->sql);
//        var_dump($event->bindings);
//        var_dump($event->time);
    });

//    $posts = App\Post::get();
    $posts = App\Post::with('user')->get();
    $posts->load('user');

    return view('posts.index', compact('posts'));
});

// Paging

//Route::get('users', function () {
//    $users = DB::table('users')->paginate(10);
//
//    return view('users.index', compact($users));
//});


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
