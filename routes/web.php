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

// Eager Loading, Paging

/*
Route::get('posts', function () {
//    DB::listen(function ($event) {
//        var_dump($event->sql);
//        var_dump($event->bindings);
//        var_dump($event->time);
//    });

//    $posts = App\Post::get();
    $posts = App\Post::with('user')->paginate(10);
//    $posts->load('user');

    return view('posts.index', compact('posts'));
});
*/

// Send Mail

Route::get('mail', function() {
    $to = 'goodasd123@naver.com';
    $subject = 'Studying sending email in Laravel';
    $data = [
        'title' => 'Hi there',
        'body' => 'This is the body of an email message',
        'user' => App\User::find(1)
    ];

    return Mail::send('emails.welcome', $data, function ($message) use($to, $subject) {
        $message->to($to)->subject($subject);
    });
});

Route::get('auth', function () {
    $credentials = [
        'email' => 'jaehun@h4lo.kr',
        'password' => 'password'
    ];

    if (!Auth::attempt($credentials)) {
        return 'Incorrect username and password combination';
    }

    Event::fire('user.login', function ($user) {
        var_dump('"user.log" event catched and passed data is :');
        var_dump($user->toArray());
    });
});

# Validation

Route::post('posts', function (\Illuminate\Http\Request $request) {
    $rule = [
        'title' => ['required'],
        'body' => ['required', 'min:10'],
    ];

    $validator = Validator::make($request->all(), $rule);

    if ($validator->fails()) {
        return redirect('posts/create')->withErrors($validator)->withInput();
    }

    return 'Valid & proceed to next job~~';
});

Route::get('posts/create', function () {
    return view('posts/create');
});

# Exception

Route::get('/excepts', function () {
    abort('403');
});

# Custom Exception Render

Route::get('/excepts/mnf', function () {
    return App\Post::findOrFail(100);
});

# parsedown-extra Markdown Example

Route::get('/md', function () {
    $text =<<<EOT
# Mardown Example

마크다운 문법이 잘 적용되나요? 참고로 이는 `Heredoc` 문법을 사용하였습니다!

---

## Using Pakage - ParseDownExtra

**Note** To make lists look nice, you can wrap items with hanging indents:

    -   Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
        Aliquam hendrerit mi posuere lectus. Vestibulum enim wisi,
        viverra nec, fringilla in, laoreet vitae, risus.
    -   Donec sit amet nisl. Aliquam semper ipsum sit amet velit.
        Suspendisse id sem consectetuer libero luctus adipiscing.
EOT;

    return app(ParsedownExtra::class)->text($text);
    # app() 헬퍼 함수는 new ParsedownExtra() 와 같은 역할을 한다.
    # 의존성 주입에 용이하여 app()을 사용하는 것이 좋음!
    # * 참고 : 라라벨 공식문서 - Service Container
});

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
