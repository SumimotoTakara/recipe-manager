<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Recipe;

class Bookmark extends Model
{
  protected $fillable = ["shop_user_id", "recipe_id"];

  public function recipe()
  {
    return $this->BelongsTo(Recipe::class);
  }
}
