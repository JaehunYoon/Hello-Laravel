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
    return view('errors.503');
});

# php artisan down 명령으로 유지보수 상태로 전환하면, 위와 같은 503 Error를 뷰로써 보여준다.
# php artisan up 명령으로 서비스 상태로 복귀할 수 있다.
# php artisan suspend 명령은 서비스를 완전히 종료시킨다.
```
