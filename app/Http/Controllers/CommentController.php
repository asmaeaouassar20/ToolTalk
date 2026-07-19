<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function create(Request $request, Post $post)
    {
        $validatedComment = $request->validate([
            'comment' => 'required',
        ]);
        $validatedComment['user_id'] = auth()->user()->id;
        $validatedComment['post_id'] = $post->id;
        Comment::create($validatedComment);
        return back();
    }
}
