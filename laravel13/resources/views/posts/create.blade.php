<h1>Create Post</h1>

<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
    @csrf

    <input type="text" name="title" placeholder="Title"><br><br>

    <textarea name="content" placeholder="Content"></textarea><br><br>

    <input type="file" name="image"><br><br>

    <button type="submit">Save</button>
</form>