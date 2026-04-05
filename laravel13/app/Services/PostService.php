<?php
namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function create($data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('posts', 'public');
        }

        $data['user_id'] = auth()->id();

        return Post::create($data);
    }

    public function update(Post $post, $data)
    {
        if (isset($data['image'])) {

            // delete old image
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            $data['image'] = $data['image']->store('posts', 'public');
        }

        $post->update($data);

        return $post;
    }

    public function delete(Post $post)
    {
        // delete image
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        return $post->delete();
    }
}
