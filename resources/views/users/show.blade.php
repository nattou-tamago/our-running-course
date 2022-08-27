@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <h1 class="text-center mb-5">{{ $user->name }} さんのマイページ</h1>

    <div class="text-end mb-5">
        <p>ユーザー名の変更は<a href="{{ route('users.edit', ['user' => $user]) }}" class="link-danger">こちら</a></p>
    </div>

    <div class="card col-md-5 mb-3 me-1">
        @if (count($courses) > 0)
            <div class="card-header text-center h5">
                登録したコース （{{ count($courses) }} 個）
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($courses as $course)
                    <li class="list-group-item"><a href="{{ route('courses.show', ['course' => $course->id]) }}" class="text-decoration-none">{{ $course->title }} : {{ $course->location }}</a></li>
                @endforeach
            </ul>
        @else
            <h5 class="card-body text-center mb-0">登録したコースはありません</h5>
        @endif
    </div>

    <div class="card col-md-5 mb-3 ms-1">
        @if (count($reviews) > 0)
            <div class="card-header text-center h5">
                レビューを投稿したコース （{{ count($reviews->unique('course')) }} 個）
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($reviews->unique('course') as $review)
                    <li class="list-group-item"><a href="{{ route('courses.show', ['course' => $review->course->id]) }}" class="text-decoration-none">{{ $review->course->title }} : {{ $review->course->location }}</a></li>
                @endforeach
            </ul>
        @else
            <h5 class="card-body text-center mb-0">レビューを投稿したコースはありません</h5>
        @endif
    </div>
</div>



@endsection
