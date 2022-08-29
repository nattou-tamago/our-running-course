@extends('layouts.app')

@section('title', 'コース一覧')

@section('content')

            <div class="col-12 mb-3">
                <div id='map' style="height: 450px;"></div>
            </div>

            @forelse($courses as $course)

                @include('courses.partials.course', [])

            @empty
                <p>登録されたランニングコースはありません。</p>
            @endforelse

@endsection

@section('scripts')

    @include('courses.partials.scripts_for_index')

@endsection
