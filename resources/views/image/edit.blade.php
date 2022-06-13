<h1>Edit Image</h1>

<form action="{{ $image->route('update') }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <img src="{{ $image->fileUrl() }}" alt="{{ $image->title }}" width="400">
    </div>
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $image->title) }}">
        @error('title')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="is_published">Publish</label>
            <input type="radio" value=1 name="is_published" id="is_published"{{ $image->is_published == 1 ? 'checked' : '' }}>Yes
            <input type="radio" value=0 name="is_published" id="is_published" {{ $image->is_published == 0 ? 'checked' : '' }}>No
        @error('is_published')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Update</button>
</form>
