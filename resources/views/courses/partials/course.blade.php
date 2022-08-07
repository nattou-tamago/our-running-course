<div class="card mb-3">
    <div class="row">
        <div class="col-md-4">
            <p>image用</p>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                    <h4 class="card-title h3 mb-3 text-truncate">{{ $course->name }}</h4>
                <p class="card-text">{{ $course->distance}}km</p>
                <p class="card-text text-truncate">
                    <small>{{ $course->location }}</small>
                </p>
                <a href="{{ route('courses.show', ['course' => $course->id]) }}" class="btn btn-info stretched-link">コースの詳細へ</a>
            </div>
        </div>
    </div>
</div>