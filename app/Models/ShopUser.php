<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;
use App\Models\User;
use App\Models\Comment;
use App\Models\Bookmark;

class ShopUser extends Model
{
  protected $fillable = ['shop_id', 'user_id', 'position'];

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function bookmarks()
  {
    return $this->hasMany(Bookmark::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function shop()
  {
    return $this->belongsTo(Shop::class);
  }
}
