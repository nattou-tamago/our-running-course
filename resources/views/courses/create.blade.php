@extends('layouts.app')

@section('title', 'コースの登録')

@section('content')
    <div class="row">
        <h1 class="text-center mb-3">コースの新規登録</h1>
        <div class="offset-1 col-10 offset-md-3 col-md-6">
            <form action="{{ route('courses.store') }}" method="POST">
                @csrf
                @include('courses.partials.form_upper')
                @include('courses.partials.checkbox_for_create')
                @include('courses.partials.form_bottom')
                <div class="mb-3">
                    <button class="btn btn-primary">登録する</button>
                </div>
            </form>
        </div>
    </div>
@endsection
