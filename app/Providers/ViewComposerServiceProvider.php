<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;

class ViewComposerServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  public function boot()
  {

    View::composer("layouts.default", function ($view) {
      $user = Auth::user();
      $shop = $user->shopUser->shop;
      $bookmarks = [];
      if ($bookmarks = $user->shopUser->bookmarks) {
        foreach ($bookmarks as $obj) {
          $obj->recipe;
        }
      }
      $view->with([
        "user_name" => $user->name,
        "user_id" => $user->id,
        "shop_name" => $shop->name,
        "bookmarks" => $bookmarks,
      ]);
    });
  }
}
