@extends('layouts.app')

@section('title', 'コースの編集')

@section('content')
    <form action="{{ route('courses.update', ['course' => $course->id]) }}" method="POST">
        @csrf
        @method('PUT')
        @include('courses.partials.form')
        <div>
            <button>更新する</button>
        </div>
    </form>
@endsection
