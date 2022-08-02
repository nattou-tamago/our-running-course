@extends('layouts.app')

@section('title', 'コース一覧')

@section('content')
    <h1>コース名：{{ $course->name }}</h1>
    <p>場所：{{ $course->location }}</p>
    <p>{{ $course->distance }} km</p>
    <p>説明：{{ $course->description }}</p>
@endsection
