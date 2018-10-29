<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blade 101 Example</title>
</head>
<body>
    <h1>String interpolation</h1>
    <p>{{ $exam }}</p>
    <hr>
    <h1>Comment</h1>
    <p><!-- {{ count(range(1, 10)) }} --></p>
    <hr>
    <h1>foreach</h1>
    <ul>
        @foreach($items as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
    <hr>
    <h1>if</h1>
    @if($itemCount = count($items))
        <p>There are {{ $itemCount }} items!</p>
    @else
        <p>There is 0 or 1 item!</p>
    @endif
    <hr>
    <h1>forelse</h1>
    @forelse($items as $item)
        <p>The item is {{ $item }}</p>
    @empty
        <p>There is no item!</p>
    @endforelse
    <br>
    <span><</span><span>?php $items = []; ?></span>
    <?php $items = []; ?>
    @forelse($items as $item)
        <p>The item is {{ $item }}</p>
    @empty
        <p>There is no item!</p>
    @endforelse
</body>
</html>