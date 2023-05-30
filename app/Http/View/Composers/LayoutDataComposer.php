<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use App\Models\Page;
use Illuminate\Contracts\View\View;

class LayoutDataComposer
{
  public function compose(View $view) {
    try {
      $pages = Page::where('visibility', '<>', 0)->get();
      $categories = Category::all();
    } catch (\Exception $e) {
      $pages = [];
      $categories = [];
    }

    
        $view->with(['pages' => $pages, 'categories' => $categories]);

  }
}