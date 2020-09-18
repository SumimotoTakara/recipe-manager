<?php

use Illuminate\Database\Seeder;
use App\Models\Bookmark;

class BookmarksTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    for ($i = 1; $i < 10; $i++) {
      Bookmark::create([
        "shop_user_id" => 1,
        "recipe_id" => $i,
      ]);
    }
  }
}
