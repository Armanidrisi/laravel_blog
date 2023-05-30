<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
  * Store the Comment.
  *
  * @param CreateCommentRequest $request
  * @return \Illuminate\Http\RedirectResponse
  */
  public function store(CreateCommentRequest $request) {
    $postId = $request->input('post_id');

    if (Auth::check()) {
      $comment = new Comment();
      $comment->post_id = $postId;
      $comment->content = $request->input('content');
      $comment->author = Auth::user()->name;
      $comment->save();

      return redirect()->back()->with('success', 'Comment added successfully');
    } else {
      return redirect()->route('login')->with('error', 'Please log in to comment');
    }
  }

}