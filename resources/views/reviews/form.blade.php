<div class="mb-2 mt-2">
@auth
    <form action="{{ route('courses.reviews.store', ['course' => $course->id]) }}" method="POST" novalidate>
        @csrf

        <div class="mb-2">
            <fieldset class="starability-basic">
                <legend>レビュー</legend>
                <input type="radio" id="first-rate1" name="rating" value="1" {{ old('rating') == 1 || old('rating') == false ? 'checked' : ''}}/>
                <label for="first-rate1" title="1">評価1</label>
                <input type="radio" id="first-rate2" name="rating" value="2" {{ old('rating') == 2 ? 'checked' : ''}}/>
                <label for="first-rate2" title="2">評価2</label>
                <input type="radio" id="first-rate3" name="rating" value="3" {{ old('rating') == 3 ? 'checked' : ''}}/>
                <label for="first-rate3" title="3">評価3</label>
                <input type="radio" id="first-rate4" name="rating" value="4" {{ old('rating') == 4 ? 'checked' : ''}}/>
                <label for="first-rate4" title="4">評価4</label>
                <input type="radio" id="first-rate5" name="rating" value="5" {{ old('rating') == 5 ? 'checked' : ''}}/>
                <label for="first-rate5" title="5">評価5</label>
            </fieldset>
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
