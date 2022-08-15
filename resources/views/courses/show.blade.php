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
                    <h5 class="card-title{{ count($course->tags) ? ' pb-2': ' pt-2'}}">{{ $course->title }}</h5>
                    @foreach ($course->tags as $tag)
                            <span class="badge rounded-pill bg-success badge-lg"><a href="{{ route('courses.tags.index', ['tag' => $tag->id]) }}" class="text-light text-decoration-none">{{ $tag->name }}</a></span>
                    @endforeach
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $course->location }}</li>
                    <li class="list-group-item">距離：{{ $course->distance }} km</li>
                    <li class="list-group-item">登録者：{{ $course->user->name }}</li>
                    <li class="list-group-item">
                        <p>{{ $course->description }}</p>
                    </li>
                </ul>
                @can('update', $course)
                    <div class="card-body">
                        <a class="btn btn-primary" href="{{ route('courses.edit', ['course' => $course->id]) }}">編集する</a>
                        <form class="d-inline" action="{{ route('courses.destroy', ['course' => $course->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">削除する</button>
                        </form>
                    </div>
                @endcan
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
            @forelse($course->reviews as $review)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">
                             さん
                        </h5>
                        <p class="card-text">
                            点：{{ $review->rating }}
                        </p>
                        <p class="card-text">
                            {{ $review->content }}
                        </p>
                        <div class="card-text">
                            {{ $review->created_at->diffForHumans() }}に登録
                        </div>
                    </div>
                </div>
            @empty
                <p>レビューはまだありません。</p>
            @endempty
        </div>
    </div>
@endsection
