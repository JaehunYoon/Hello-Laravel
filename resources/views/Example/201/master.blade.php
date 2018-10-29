<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    @yield('style')
    @yield('content')

    @section('sidebar')
        <p>This is master sidebar</p>
    @show

    @include('Example.201.footer')
    @yield('script')
</body>
</html>