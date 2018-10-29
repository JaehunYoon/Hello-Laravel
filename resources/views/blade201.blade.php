<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
</head>
<body>
    @extends('master')

    @section('style')
        <style>
            body {background : lightskyblue;}
        </style>
    @stop

    @section('content')
        Your content here!!
    @stop

    @section('script')
        <script>
            alert("H4lo~~ It's Blade 201 example :D");
        </script>
    @stop
</body>
</html>