@extends('layouts.app')

@section('title', 'コースの編集')

@section('content')
    <div class="row">
        <h1 class="text-center mb-3">コースの編集</h1>
        <div class="offset-1 col-10 offset-md-3 col-md-6">
            <form action="{{ route('courses.update', ['course' => $course->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('courses.partials.form_upper')
                @include('courses.partials.checkbox_for_edit')
                @include('courses.partials.form_bottom')
                <div class="mb-3">
                    <button class="btn btn-primary">更新する</button>
                </div>
            </form>
        </div>
    </div>
@endsection
