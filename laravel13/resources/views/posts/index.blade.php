<h1>All Posts</h1>

<a href="{{ route('posts.create') }}">Create Post</a>

@foreach($posts as $post)
    <div>
        <h2>{{ $post->title }}</h2>
        <img src="{{ asset('storage/'.$post->image) }}" width="200">
        <p>{{ $post->content }}</p>

        <a href="{{ route('posts.edit',$post) }}">Edit</a>

        <form method="POST" action="{{ route('posts.destroy',$post) }}">
            @csrf @method('DELETE')
            <button>Delete</button>
        </form>

        <!-- Comments -->
        <h4>Comments</h4>
        @foreach($post->comments as $comment)
            <p>{{ $comment->comment }}</p>
        @endforeach

        <form method="POST" action="/comments">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="text" name="comment">
            <button>Add Comment</button>
        </form>
    </div>
@endforeach