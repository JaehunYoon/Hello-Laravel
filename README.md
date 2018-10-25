# Hello-Laravel
👍👍Lets study Laravel PHP Framework!!👍👍

## Routing

Laravel Framework는 Front Controller 방식의 라우팅을 사용한다.

* [PHP 예제로 알아보는 프런트 컨트롤러 (Front Controller) 패턴](https://medium.com/@smartbosslee/php-%EC%98%88%EC%A0%9C%EB%A1%9C-%EC%95%8C%EC%95%84%EB%B3%B4%EB%8A%94-%ED%94%84%EB%9F%B0%ED%8A%B8-%EC%BB%A8%ED%8A%B8%EB%A1%A4%EB%9F%AC-front-controller-%ED%8C%A8%ED%84%B4-c00e9d222963)

사용자의 모든 Request가 라우팅 파일로 넘어온 후 어떤 요청인지에 따라 라우팅 파일에서 다양한 컨트롤러로 요청들을 적절하게 분배한다.

```
Request -> [Routing File] -> 임의의 컨트롤러

# 컨트롤러는 Laravel에서 제공하는 컨트롤러도 있지만, 직접 만들어서 사용하는 경우가 많다.
# Request가 들어오면 라우팅 파일을 보면 된다라고 생각하자!
```

### Routing Manual

```php
Route::get('/' function()
{
    return "H4lo, World!";
});
# '/' URL로 접근하면 "H4lo, World!" 라는 문자열을 반환한다.

# Slim PHP Framework 를 사용해보았다면 이해하기가 쉬울 것!
# Route::[Method]('[Resource', function() {[this is call back function]});
# -> Method : get, post, put, delete
# Method URL에 Request가 오면 fuction으로 싸진 Closure가 동작한다는 의미!

Route::get('/', 'WelcomeController@index';);
# 사용자가 '/' URL로 접근하면, WelcomeController의 index라는 메소드를 실행하여 결과를 반환한다.
```

```php
# /routes/web.php

Route::get('/', function () {
    return view('welcome');
});
# view() 는 Helper Function이다.

return View::make('welcome');
# 위와 같이 Laravel에서 제공하는 Facade를 이용할 수도 있다.
# view()-> 까지 입력했을 때 코드힌트가 나와서 Helper Function을 더 선호한다고 하는데,
# "코드 힌트"에 대해 알아볼 필요가 있다!
```

```php
Route::get('/', function () {
    return abort(503);
});

# php artisan down 명령으로 유지보수 상태로 전환하면, 위와 같은 503 Error를 뷰로써 보여준다.
# php artisan up 명령으로 서비스 상태로 복귀할 수 있다.
# php artisan suspend 명령은 서비스를 완전히 종료시킨다.
```

---

### Data Binding in view

```php
<p>
    {{ $greeting }} {{ $name ?? '' }}. Nice to meet you~~
</p>

# resources/views/ 경로에 hello.blade.php 파일을 생성하였음.
# {{ }} 은 라라벨의 템플릿 엔진인 블레이드에서 사용하는 String interpolation 문법이다.
# PHP로 치면, 뷰 내에서 <?= ?> 과 같은 역할을 해준다.

# 특수문자가 포함된 데이터를 뷰에 바인딩시킬 때에는 {{ }} 대신 {!! !!} 를 사용한다.
# {{ $name ?? '' }} 에서 ??는 PHP7 이후부터 나온 문법으로, $name에 값이 존재하면 $name을,
# 아니라면 공백을 사용하는 삼항연산자의 역할을 한다. PHP5.3 에서는 ?:로 사용하고 있었다.
# or를 사용하는 예제도 있으나 or를 사용할 경우 name 값 대신 1이 출력된다.
```

데이터를 바인딩 하는 법에는 여러 가지 방법이 있다.

`with()` 메소드로 뷰에 데이터 바인딩하는 방법, `view()`의 2번째 인자로 데이터를 넘기는 방법 등이 있는데,

실전에서는 PHP 내장함수인 `compact(mixed $varname)`와 조합하여 데이터 바인딩을 진행하는 편이다.

#### compact(mixed $varname)

compact 함수는 변수를 이용하여 연관배열을 만드는 함수이다.

변수명은 Key 값으로, 변수값은 배열값으로 바뀐다.

* [PHP.net compact()](http://php.net/manual/kr/function.compact.php)

반대로 연관배열을 변수로 전환해주는 함수는 `extract()` 이다.

* [PHP.net extract()](http://php.net/manual/kr/function.extract.php)

```php
Route::get('/hello', function () {
    $greeting = '안녕하세요';
    $name = 'h4lo';

    return view('hello', compact('greeting', 'name'));
});
```

routes/web.php 파일에 다음과 같은 라우팅 메소드를 추가한다.

`hello.blade.php`에 view 메소드의 두번째 인자에서 compact 함수로 만들어진 연관배열을 파라미터 값으로 넘겨, html 코드에 데이터를 바인딩한다.

 