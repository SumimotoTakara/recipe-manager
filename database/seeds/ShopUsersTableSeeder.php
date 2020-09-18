<?php

use Illuminate\Database\Seeder;
use App\Models\ShopUser;

class ShopUsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    ShopUser::create([
      "shop_id" => 1,
      "user_id" => 1,
      "position" => "owner",
    ]);

    for ($i = 2; $i < 15; $i++) {
      ShopUser::create([
        "shop_id" => 1,
        "user_id" => $i,
        "position" => "staff",
      ]);
    }
  }
}
