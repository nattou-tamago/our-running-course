<div class="mb-3">
    <label for="formFileMultiple" class="form-label">画像の追加アップロード（合計3枚まで）</label>
    <input class="form-control" name="images[]" type="file" id="formFileMultiple" multiple>
</div>
@if (isset($course->images))
    <div class="mb-3">
        @foreach ($course->images as $i => $image)
            <div class="form-check-inline">
                @if (config('app.env') === 'production')
                    <img src="{{ Storage::disk('s3')->url($image->path) }}" class="img-thumbnail" alt="course_image" width="100">
                @else
                    <img src="{{ asset('../storage/' . $image->path) }}" class="img-thumbnail" alt="course_image" width="100">
                @endif
                <input type="checkbox" name="deleteImages[]" id="image-{{ $i }}" value="{{ $image }}">
                <label for="image-{{ $i }}">削除する</label>
            </div>
        @endforeach
    </div>
@endif
@error ('images*')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
@error ('images.*')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
@if (session('number-of-images-error'))
<div class="alert alert-danger">{{ session('number-of-images-error') }}</div>
@endif
