@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user()->name === "h4lo")
                        <span>주인님 안녕하세요.</span>
                    @else
                        <span>환영합니다, {{ Auth::user()->name }}님!</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
