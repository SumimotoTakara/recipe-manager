<?php

namespace App\Policies;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\ShopUser;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ShopUserPolicy
{
  use HandlesAuthorization;

  /**
   * Create a new policy instance.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  public function delete(User $user, ShopUser $shopuser)
  {
    return  $user->shopUser->id === $shopuser->id || Gate::authorize("isOwner")
      ? Response::allow()
      : Response::deny("自分以外のデータは操作できません");
  }
}
