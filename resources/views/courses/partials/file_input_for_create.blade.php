<div class="mb-3">
    <label for="formFileMultiple" class="form-label">画像のアップロード（3枚まで）</label>
    <input class="form-control" name="images[]" type="file" id="formFileMultiple" multiple>
</div>
@error ('images')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
@error ('images.*')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
