@extends('layouts.app')

@section('title', 'コース一覧')

@section('content')
    @forelse($courses as $course)
        <p>{{ $course->name }}</p>
    @empty
        <p>ランニングコースはありません。</p>
    @endforelse
@endsection
