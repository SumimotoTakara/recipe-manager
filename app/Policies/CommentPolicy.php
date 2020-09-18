<?php

namespace App\Policies;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
  use HandlesAuthorization;

  public function __construct()
  {
    //
  }

  public function delete(User $user, Comment $comment)
  {
    return $user->shopUser->id === $comment->shop_user_id || Gate::authorize("isOwner")
      ? Response::allow()
      : Response::deny("自分以外のコメントは操作できません");
  }
}
