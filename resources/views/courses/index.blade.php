@extends('layouts.app')

@section('title', 'コース一覧')

@section('content')

            @forelse($courses as $course)

                @include('courses.partials.course', [])

            @empty
                <p>登録されたランニングコースはありません。</p>
            @endforelse

@endsection
