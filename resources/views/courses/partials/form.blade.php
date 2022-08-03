<div>
    <label for="name">コース名</label>
    <input type="text" name="name" id="name" value="{{ old('name', optional($course ?? null)->name) }}">
</div>
@error ('name')
    <div>{{ $message }}</div>
@enderror
<div>
    <label for="location">場所</label>
    <input type="text" name="location" id="location" value="{{ old('location', optional($course ?? null)->location) }}">
</div>
<div>
    <label for="distance">距離</label>
    <input type="text" class="form-control" placeholder="0.0" aria-label="距離" aria-describedby="distance-label" id="distance" name="distance" value="{{ old('distance',optional($course ?? null)->distance) }}">
    <span class="input-group-text" id="distance-label">km</span>
</div>
<div>
    <label class="form-label" for="description">説明</label>
    <textarea class="form-control" type="text" name="description" id="description">{{ old('description', optional($course ?? null)->description) }}</textarea>
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
