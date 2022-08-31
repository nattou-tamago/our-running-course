@extends('layouts.app')

@section('title', 'ホーム')

@section('content')
    <div class="px-3 d-flex align-items-center justify-content-center" id="home-index">
        <div>
            <h1>みんなのランニングコース</h1>
            <p class="lead">お気に入りのランニングコースを登録したり、<br>走ってみたいコースを探しましょう！</p>
            <a href="{{ route('courses.index') }}" class="btn btn-lg btn-primary btn-home">ランニングコース一覧へ</a>
        </div>
    </div>
@endsection
