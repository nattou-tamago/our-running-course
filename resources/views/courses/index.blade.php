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
    <script>
        const mapToken = "{{ env('MAPBOX_TOKEN') }}";
    </script>
    <script src="{{ asset('js/clusterMap.js') }}"></script>
@endsection
