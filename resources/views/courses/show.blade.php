@extends('layouts.app')

@section('title', $course->title)

@section('content')
    <div class="row">
        <div class="col-12 col-md-6">
            <div>
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    @if (count($course->images) > 0)
                    <div class="carousel-inner">
                        @foreach ($course->images as $image)
                        <div class="carousel-item @if($loop->first) active @endif">
                            @if (config('app.env') === 'production')
                                <img src="{{ Storage::disk('s3')->url($image->path) }}" class="d-block w-100 img-thumbnail" alt="course-image">
                            @else
                                <img src="{{ asset('../storage/' . $image->path) }}" class="d-block w-100 img-thumbnail" alt="course-image">
                            @endif
                        </div>
                        @endforeach
                    </div>
                        @if (count($course->images) > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    @else
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                @if (config('app.env') === 'production')
                                    <img src="{{ secure_asset('images/no_image.png') }}" alt="no_image" class="d-block w-100 img-thumbnail">
                                @else
                                    <img src="{{ asset('images/no_image.png') }}" alt="no_image" class="d-block w-100 img-thumbnail">
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title{{ count($course->tags) ? ' pb-2': ' pt-2'}}">{{ $course->title }}</h5>
                    @foreach ($course->tags as $tag)
                            <span class="badge rounded-pill bg-success badge-lg"><a href="{{ route('courses.tags.index', ['tag' => $tag->id]) }}" class="text-light text-decoration-none">{{ $tag->name }}</a></span>
                    @endforeach
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $course->location }}</li>
                    <li class="list-group-item">?????????{{ $course->distance }} km</li>
                    <li class="list-group-item">????????????{{ $course->user->name }} ??????</li>
                    <li class="list-group-item">
                        {{ $course->description }}
                    </li>
                </ul>
                @can('update', $course)
                    <div class="card-body">
                        <a class="btn btn-primary" href="{{ route('courses.edit', ['course' => $course->id]) }}">????????????</a>
                        <form class="d-inline" action="{{ route('courses.destroy', ['course' => $course->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">????????????</button>
                        </form>
                    </div>
                @endcan
                <div class="card-footer text-muted">
                    {{ $course->created_at->diffForHumans() }}?????????
                    @if(now()->diffInHours($course->created_at) < 24)
                        <span class="badge rounded-pill bg-warning text-dark">New!</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">

            <div id='mapForShow' style='width: 100%; height: 300px;' class="mb-3"></div>

            @include('reviews.form')

            @forelse($course->reviews as $review)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title h6">
                             {{ $review->user->name }} ??????
                        </h5>
                        <p class="starability-result" data-rating="{{ $review->rating }}">
                            ??????{{ $review->rating }}
                        </p>
                        <p class="card-text">
                            ???????????????{{ $review->content }}
                        </p>
                        <div class="card-text d-flex justify-content-between">
                            {{ $review->created_at->diffForHumans() }}?????????
                            @can('delete', $review)
                                <form action="{{ route('courses.reviews.destroy', ['course' => $course->id, 'review' => $review->id]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">????????????</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            @empty
                <p>???????????????????????????????????????</p>
            @endempty
        </div>
    </div>

@endsection

@section('scripts')

    @include('courses.partials.scripts_for_show')

@endsection
