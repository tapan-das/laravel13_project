<h1>Edit Post</h1>

<form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Title -->
    <input type="text" name="title" value="{{ $post->title }}" placeholder="Title"><br><br>

    <!-- Content -->
    <textarea name="content" placeholder="Content">{{ $post->content }}</textarea><br><br>

    <!-- Show old image -->
    @if($post->image)
        <p>Current Image:</p>
        <img src="{{ asset('storage/'.$post->image) }}" width="100"><br><br>
    @endif

    <!-- Upload new image -->
    <input type="file" name="image"><br><br>

    <button type="submit">Update</button>
</form>