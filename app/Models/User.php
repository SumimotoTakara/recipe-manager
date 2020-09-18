<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\ShopUser;

class User extends Authenticatable
{
  use Notifiable;
  protected $fillable = [
    'name', 'email', 'password',
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function shopUser()
  {
    return $this->hasOne(ShopUser::class);
  }

  public function doesBookmark($recipe_id)
  {
    if ($bookmark = Bookmark::where("shop_user_id", $this->shopUser->id)->where("recipe_id", $recipe_id)->first()) {
    } else {
      return null;
    }
    return $bookmark;
  }
}
