<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>
    @extends('master')

    @section('content')
        <h1>List of Users</h1>
        <hr>
        <ul>
            @forelse($users as $user)
                <li>
                    {{ $user->name }}
                    <small>
                        's Email is {{ $user->email }}
                    </small>
                </li>
            @empty
                <p>There is no article!</p>
            @endforelse
        </ul>
    @stop
</body>
</html>