<div class="mb-3">
    <p>特徴</p>
    @foreach ($tags as $tag)
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]"
        @if(empty(old()))
          {{ $course->tags->contains('id', $tag->id) ? 'checked' : '' }}
        @else
          {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
        @endif
        >
        <label class="form-check-label" for="{{ $tag->id }}">{{ $tag->name }}</label>
      </div>
    @endforeach
</div>
