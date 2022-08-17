<div class="mb-3">
    <label class="form-label" for="description">説明</label>
    <textarea class="form-control" type="text" name="description" id="description">{{ old('description', optional($course ?? null)->description) }}</textarea>
</div>
@error ('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
