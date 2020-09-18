<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class RecipePolicy
{
  use HandlesAuthorization;

  public function __construct()
  {
    //
  }

  public function view(User $user, Recipe $recipe)
  {
    return $user->shopUser->shop_id === $recipe->shop_id
      ? Response::allow()
      : Response::deny("所属するお店以外のページは閲覧できません");
  }
  public function update(User $user, Recipe $recipe)
  {
    return $user->shopUser->shop_id === $recipe->shop_id
      ? Response::allow()
      : Response::deny("所属するお店以外のページは閲覧できません");
  }
  public function delete(User $user, Recipe $recipe)
  {
    return $user->shopUser->shop_id === $recipe->shop_id
      ? Response::allow()
      : Response::deny("所属するお店以外のデータは操作できません");
  }
}
