@extends('layouts.app')

@section('title', $course->title)

@section('content')
    <div class="row">
        <div class="col-12 col-md-6">
            <div>
                <p>image用</p>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->title }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $course->location }}</li>
                    <li class="list-group-item">距離：{{ $course->distance }} km</li>
                    <li class="list-group-item">登録者：</li>
                    <li class="list-group-item">
                        <p>{{ $course->description }}</p>
                    </li>
                </ul>
                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('courses.edit', ['course' => $course->id]) }}">編集する</a>
                    <form class="d-inline" action="{{ route('courses.destroy', ['course' => $course->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">削除する</button>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    {{ $course->created_at->diffForHumans() }}に登録
                    @if(now()->diffInHours($course->created_at) < 24)
                        <span class="badge rounded-pill bg-warning text-dark">New!</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <p>レビュー用</p>
        </div>
    </div>
@endsection
