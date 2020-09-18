<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
  public function __construct()
  {
    $this->middleware(function ($request, $next) {
      $this->user = Auth::user();
      $this->shop = $this->user->shopUser->shop;
      return $next($request);
    });
  }

  public function store(CommentRequest $request)
  {
    if ($this->shop->recipes->contains("id", $request->recipe_id)) {
      Comment::create([
        "recipe_id" => $request->recipe_id,
        "shop_user_id" => $this->user->Shopuser->id,
        "comment" => $request->comment,
      ]);
    } else {
      return abort(404);
    }
    return redirect()->back();
  }

  public function destroy(Comment $comment)
  {
    $this->authorize("delete", $comment);
    $comment->delete();
    return redirect()->back();
  }
}
