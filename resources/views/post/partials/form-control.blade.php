<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="{{ old('title') ?? $get->title }}" class="form-control">
    <div class="mt-2 text-danger">
        @error('title')
            {{ $message }}
        @enderror
    </div>
</div>
<div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" id="body" class="form-control">{{ old('body') ?? $get->body  }}</textarea>
    <div class="mt-2 text-danger">
        @error('body')
        {{ $message }}
    @enderror
    </div>
</div>
<button type="submit" class="btn btn-primary">{{ $submit ?? 'Update' }}</button>