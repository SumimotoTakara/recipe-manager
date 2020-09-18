<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BookmarkRequest;

class BookmarkController extends Controller
{

  public function __construct()
  {
    $this->middleware(function ($request, $next) {
      $this->user = Auth::user();
      $this->shop = $this->user->shopUser->shop;
      return $next($request);
    });
  }

  public function store(BookmarkRequest $request)
  {
    if ($this->shop->recipes->contains("id", $request->recipe_id)) {
      Bookmark::create([
        "shop_user_id" => $this->user->shopUser->id,
        "recipe_id" => $request->recipe_id,
      ]);
    } else {
      return abort(404);
    }
    return redirect()->back();
  }

  public function destroy(Bookmark $bookmark)
  {
    $this->authorize("delete", $bookmark);
    $bookmark->delete();
    return redirect()->back();
  }
}
