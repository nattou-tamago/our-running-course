@extends('layouts.app')

@section('title', 'コースの登録')

@section('content')
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">コース名</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>
        @error ('name')
            <div>{{ $message }}</div>
        @enderror
        <div>
            <label for="location">場所</label>
            <input type="text" name="location" id="location" value="{{ old('location') }}">
        </div>
        <div>
            <label for="distance">距離</label>
            <input type="text" class="form-control" placeholder="0.0" aria-label="距離" aria-describedby="distance-label" id="distance" name="distance" value="{{ old('distance') }}">
            <span class="input-group-text" id="distance-label">km</span>
        </div>
        <div>
            <label class="form-label" for="description">説明</label>
            <textarea class="form-control" type="text" name="description" id="description">{{ old('description') }}</textarea>
        </div>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
            <button>登録する</button>
        </div>
    </form>
@endsection
