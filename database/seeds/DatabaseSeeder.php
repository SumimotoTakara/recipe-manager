<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call([
      UsersTableSeeder::class,
      ShopsTableSeeder::class,
      ShopUsersTableSeeder::class,
      RecipesTableSeeder::class,
      BookmarksTableSeeder::class,
      CommentsTableSeeder::class,
      NewsTableSeeder::class,
    ]);
  }
}
