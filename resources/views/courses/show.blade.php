@extends('layouts.app')

@section('title', 'コース一覧')

@section('content')
    <h1>{{ $course->name }}</h1>
    <p>{{ $course->distance }} km</p>
    <p>{{ $course->description }}</p>
@endsection
