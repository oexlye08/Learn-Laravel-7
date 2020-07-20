<div class="form-group">
    <input type="file" name="thumbnail" id="thumbnail"> 

    <div class="mt-2 text-danger">
        @error('thumbnail')
            {{ $message }}
        @enderror
    </div>
</div>

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
    <label for="category">Category</label>
    <select name="category" id="category"class="form-control">
        <option disabled selected>Choose one!</option>
        @foreach ($categories as $category)
            <option {{ $category->id == $get->category_id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <div class="mt-2 text-danger">
        @error('category')
            {{ $message }}
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="tags">Tags</label>
    <select name="tags[]" id="tags"class="form-control select2" multiple>
        {{-- @foreach ($get->tags as $tag)
            <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach --}}
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}"
                @foreach ($get->tags as $value)
                    {{ $tag->id == $value->id ? 'selected' :'' }}
                @endforeach
                >{{ $tag->name }}</option>
        @endforeach
    </select>
    <div class="mt-2 text-danger">
        @error('tags')
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