<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::create([
      "name" => "オーナーA",
      "email" => "owner-a@test.com",
      "password" => Hash::make("ownerowner"),
      "created_at" => now(),
      "updated_at" => now()
    ]);

    for ($i = 1; $i < 14; $i++) {
      User::create([
        "name" => "スタッフ" . $i,
        "email" => "staff" . $i . "@test.com",
        "password" => Hash::make("staffstaff" . $i),
        "created_at" => now(),
        "updated_at" => now()
      ]);
    }
  }
}
