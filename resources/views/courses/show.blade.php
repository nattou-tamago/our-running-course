@extends('layouts.app')

@section('title', 'コース一覧')

@section('content')
    <h1>コース名：{{ $course->name }}</h1>
    <p>場所：{{ $course->location }}</p>
    <p>{{ $course->distance }} km</p>
    <p>説明：{{ $course->description }}</p>

    <div>
        <form action="{{ route('courses.destroy', ['course' => $course->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>削除する</button>
        </form>
    </div>
@endsection
