<?php

namespace App\Providers;
use App\Models\Category;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
  /**
  * Register services.
  */
  public function register(): void
  {
    //
  }

  /**
  * Bootstrap services.
  */
  public function boot() {
    View::composer('layouts.app','App\Http\View\Composers\LayoutDataComposer');
  }
}