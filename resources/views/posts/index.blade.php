<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eager Loading</title>
</head>
<body>
    @extends('posts.master')
    {{ $posts[0]->title }}

    <hr>

    {{--@foreach($posts as $post)--}}
        {{--{{ $post->title }}--}}
    {{--@endforeach--}}

    {{--@section('content')--}}
    <h1>List of Posts</h1>
    <hr>
    <ul>
        @forelse($posts as $post)
            <li>
                {{ $post->title }}
                <small>
                    by {{ $post->user->name }}
                </small>
            </li>
        @empty
            <p>There is no article!</p>
        @endforelse
    </ul>
    {{--@stop--}}
</body>
</html>