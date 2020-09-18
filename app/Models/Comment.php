<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ShopUser;

class Comment extends Model
{
  protected $fillable = ['recipe_id', 'shop_user_id', 'comment'];

  public function shopUser()
  {
    return $this->belongsTo(ShopUser::class);
  }
}
