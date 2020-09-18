<?php

use Illuminate\Database\Seeder;
use App\Models\Shop;

class ShopsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Shop::create([
      "name" => "レストランA",
      "auth_id" => "rstrnta123",
      "created_at" => now(),
      "updated_at" => now()
    ]);
  }
}
