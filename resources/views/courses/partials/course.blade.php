<div class="card mb-3">
    <div class="row">
        <div class="col-md-4">
            <p>image用</p>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                    <h4 class="card-title h3 mb-3 text-truncate">{{ $course->title }}</h4>
                <p class="card-text">{{ $course->distance }}km</p>
                <p class="card-text text-truncate">
                    <small>{{ $course->location }}</small>
                </p>
                <p>
                    @foreach ($course->tags as $tag)
                        <span class="badge rounded-pill bg-success badge-lg"><a href="{{ route('courses.tags.index', ['tag' => $tag->id]) }}" class="text-light text-decoration-none">{{ $tag->name }}</a></span>
                    @endforeach
                </p>
                <p class="card-text">
                    @if($course->reviews_count)
                        <small>レビュー：{{ $course->reviews_count }}件</small>
                    @else
                        <small>レビュー：なし</small>
                    @endif
                </p>
                <a href="{{ route('courses.show', ['course' => $course->id]) }}" class="btn btn-info">コースの詳細へ</a>
            </div>
        </div>
    </div>
</div>
