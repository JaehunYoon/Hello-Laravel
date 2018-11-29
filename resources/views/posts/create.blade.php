<h1>New Post</h1>
<hr>
<form action="/posts" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div>
        <label for="title">Title : </label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">
        {!! $errors->first('title', '<span>:message</span>') !!}
    </div>
    <div>
        <label for="body">Body : </label>
        <textarea name="body" id="body" cols="30" rows="10">{{ old('body') }}</textarea>
        {!! $errors->first('body', '<span>:message</span>') !!}
    </div>
    <div>
        <button type="submit">Create Net Post</button>
    </div>
</form>

{{--{{ var_dump(Session::all()) }}--}}