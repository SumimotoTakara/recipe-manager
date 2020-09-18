<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The policy mappings for the application.
   *
   * @var array
   */
  protected $policies = [
    // 'App\Model' => 'App\Policies\ModelPolicy',
    "App\Models\Recipe" => "App\Policies\RecipePolicy",
    "App\Models\User" => "App\Policies\UserPolicy",
    "App\Models\ShopUser" => "App\Policies\ShopUserPolicy",
    "App\Models\News" => "App\Policies\NewsPolicy",
    "App\Models\Comment" => "App\Policies\CommentPolicy",
    "App\Models\Bookmark" => "App\Policies\BookmarkPolicy",
  ];

  /**
   * Register any authentication / authorization services.
   *
   * @return void
   */
  public function boot()
  {
    $this->registerPolicies();

    //オーナーかどうか
    Gate::define("isOwner", function ($user) {
      return $user->shopUser->position === "owner"
        ? Response::allow()
        : Response::deny("オーナーのみの権限となります");
    });
  }
}
