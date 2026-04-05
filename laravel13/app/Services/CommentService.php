<?php
namespace App\Services;

use App\Models\Comment;

class CommentService
{
    public function create($data)
    {
        $data['user_id'] = auth()->id();
        return Comment::create($data);
    }
}
