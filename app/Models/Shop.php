<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\ShopUser;
use App\Models\Recipe;
use App\Models\News;

class Shop extends Model
{
  protected $fillable = ["name", "auth_id"];

  public function shopUsers()
  {
    return $this->hasMany(ShopUser::class);
  }

  public function recipes()
  {
    return $this->hasMany(Recipe::class);
  }
  public function news()
  {
    return $this->hasMany(News::class);
  }


  public function getThisMonthNews()
  {
    $this_month = new Carbon("first day of this month");
    return $this->news->where("created_at", ">", $this_month)->sortByDesc("id")->values()->collect();
  }
  public function getLastMonthNews()
  {
    $this_month = new Carbon("first day of this month");
    $last_month = new Carbon("first day of last month");
    return $this->news->where("created_at", ">", $last_month)->where("created_at", "<", $this_month)->sortByDesc("id")->values()->collect();
  }

  public function getAllRecipes()
  {
    return $this->recipes->sortByDesc("updated_at")->values()->collect();
  }

  public function getAllShopUsers()
  {
    $shop_users = $this->shopUsers;
    foreach ($shop_users as $obj) {
      $obj->user;
    }
    return $shop_users;
  }

  public function makeOwner($user_id)
  {
    //ショップが作成されたときに、作成したユーザーがオーナーとしてShopUsersテーブルに記録するためのもの
    ShopUser::create([
      "shop_id" => $this->id,
      "user_id" => $user_id,
      "position" => "owner",
    ]);
  }

  public function toAccept($user_id)
  {
    ShopUser::create([
      "shop_id" => $this->id,
      "user_id" => $user_id,
      "position" => "staff",
    ]);
  }
}
