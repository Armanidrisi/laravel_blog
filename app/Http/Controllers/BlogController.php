<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class BlogController extends Controller
{
  /**
  * List the Posts.
  *
  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
  public function index() {
    $posts = Post::orderBy('id', 'desc')->paginate(10);
    return view('home', ['posts' => $posts]);
  }

  /**
  * Show the single post.
  *
  * @param $id
  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
  public function show(string $id) {
    $post = Post::where('slug', $id)->firstOrFail();
    return view('post', ['post' => $post]);
  }

}