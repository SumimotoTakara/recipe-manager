<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Bookmark;


class Recipe extends Model
{
  protected $fillable = ['shop_id', 'name', 'category', 'image', 'description'];

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function bookmarks()
  {
    return $this->hasMany(Bookmark::class);
  }

  public function getAllComments()
  {
    $comments = $this->comments;
    if (count($comments) > 0) {
      foreach ($comments as $obj) {
        $obj->shopUser->user;
      }
    }
    return $comments;
  }
}
