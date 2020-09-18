<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    for ($i = 1; $i < 101; $i++) {
      Comment::create([
        "recipe_id" => mt_rand(1, 30),
        "shop_user_id" => ($i % 14) + 1,
        "comment" => "hello test comment" . $i
      ]);
    }
  }
}
