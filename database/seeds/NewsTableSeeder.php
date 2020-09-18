<?php

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    for ($i = 0; $i < 10; $i++) {
      News::create([
        "shop_id" => 1,
        "content" => "hello this is test news hello this is test",
        "created_at" => "2020-09-" . $i
      ]);
    }
  }
}
