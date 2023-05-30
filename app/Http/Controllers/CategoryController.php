<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
  /**
  * List the Posts By Category.
  *
  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
  public function index($id) {
    $category = Category::where('id', $id)->firstOrFail();

    $posts = $category->posts()->paginate(10);

    return view('category', ['posts' => $posts, 'category' => $category->name, 'total' => $posts->total()]);

  }
  

}