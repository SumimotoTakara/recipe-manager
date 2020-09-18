<?php

use Illuminate\Database\Seeder;
use App\Models\Recipe;

class RecipesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
      for ($i = 1; $i < 31; $i++) {
          $category = ["salad", "meat", "fried", "dessert"];
          $images = ["greensalad.jpg", "beefsteak.jpg", "firedpotato.jpg", "chocolatecake.jpg"];
          $n = mt_rand(0, 3);

          Recipe::create([
        "shop_id" => 1,
        "category" => $category[$n],
        "name" => "サンプル" . $i,
        "image" => $images[$n],
        "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
        "created_at" => "2019-01-01 ",
        "updated_at" => date("2020/01/02 01:01:01", strtotime("+" . $i . "day"))
      ]);
      }
  }
}
