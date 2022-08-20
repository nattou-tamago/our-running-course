<div class="mb-2 mt-2">
@auth
    <form action="{{ route('courses.reviews.store', ['course' => $course->id]) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="customRange2" class="form-label">評価</label>
            <input type="range" class="form-range" min="1" max="5" id="customRange2" name="rating">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">コメント</label>
            <textarea class="form-control" name="content" id="content" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">投稿する</button>
        </div>
    </form>
    @if($errors->any())
        <div class="mt-2 mb-2">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
        </div>
    @endif
@else
    <p>レビューを投稿するには<a href="{{ route('login') }}">ログイン</a>してください。</p>
@endauth
</div>
<hr/>
