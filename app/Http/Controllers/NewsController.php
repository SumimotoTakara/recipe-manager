<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\News;

class NewsController extends Controller
{
  public function __construct()
  {
    $this->middleware(function ($request, $next) {
      $this->user = Auth::user();
      return $next($request);
    });
  }

  public function store(NewsRequest $request)
  {
    Gate::authorize("isOwner");
    News::create([
      "shop_id" => $this->user->shopUser->shop_id,
      "content" => $request->content,
    ]);
    return redirect()->back();
  }



  public function destroy(News $news)
  {
    Gate::authorize("isOwner");
    $this->authorize("delete", $news);
    $news->delete();
    return redirect()->back();
  }

}
