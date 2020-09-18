<?php

use App\Enums\PositionStateType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('shop_users', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('shop_id');
      $table->unsignedInteger('user_id');
      $table->enum('position', ['owner', 'staff']);
      $table->timestamps();

      $table->foreign('shop_id')
        ->references('id')
        ->on('shops')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade')
        ->onUpdate('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('shop_users');
  }
}
