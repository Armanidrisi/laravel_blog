<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class pageController extends Controller
{
    /**
  * Show the page.
  *
  * @param $id
  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
  public function show($id) {
    $page = Page::where('slug', $id)->firstOrFail();
    return view('page', ['page' => $page]);
  }

}