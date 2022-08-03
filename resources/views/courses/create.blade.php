@extends('layouts.app')

@section('title', 'コースの登録')

@section('content')
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        @include('courses.partials.form')
        <div>
            <button>登録する</button>
        </div>
    </form>
@endsection
