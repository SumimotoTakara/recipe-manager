<?php

namespace App\Policies;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;


class UserPolicy
{
  use HandlesAuthorization;

  public function __construct()
  {
    //
  }
  public function view($auth_user, User $user)
  {
    return $auth_user->id === $user->id
      ? Response::allow()
      : Response::deny("自分以外のアカウントは表示できません");
  }

  public function update($auth_user, User $user)
  {
    return $auth_user->id === $user->id
      ? Response::allow()
      : Response::deny("自分以外のアカウントは操作できません");
  }
}
