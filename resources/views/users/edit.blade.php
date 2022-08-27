@extends('layouts.app')

@section('content')
    <div class="row">
        <h1 class="text-center mb-5">ユーザー名の変更</h1>
        <div class="offset-1 col-10 offset-md-3 col-md-6">
            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">ユーザー名</label>
                    <input name="name" type="text" class="form-control" id="name" value="{{ old('name', $user->name) }}">
                </div>
                @error ('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <button class="btn btn-primary">更新する</button>
                </div>
            </form>
        </div>
    </div>
@endsection
