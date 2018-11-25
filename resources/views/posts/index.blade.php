<body>
    @extends('posts.master')

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
    @if($posts)
        <div class="text-center">
            {!! $posts->render() !!}
        </div>
    @endif
    {{--@stop--}}
</body>
</html>