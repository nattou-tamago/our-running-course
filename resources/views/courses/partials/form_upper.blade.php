<div class="mb-3">
    <label class="form-label" for="title">コース名</label>
    <input class="form-control" type="text" name="title" id="title" value="{{ old('title', optional($course ?? null)->title) }}">
</div>
@error ('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="mb-3">
    <label class="form-label" for="location">場所</label>
    <input class="form-control" type="text" name="location" id="location" value="{{ old('location', optional($course ?? null)->location) }}">
</div>
@error ('location')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="mb-3">
    <label class="form-label" for="distance">距離</label>
    <div class="input-group mb-3">
        <input class="form-control" type="text" class="form-control" placeholder="0.0" aria-label="距離" aria-describedby="distance-label" id="distance" name="distance" value="{{ old('distance',optional($course ?? null)->distance) }}">
        <span class="input-group-text" id="distance-label">km</span>
    </div>
</div>
@error ('distance')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
