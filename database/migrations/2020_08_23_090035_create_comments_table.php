<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('comments', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('shop_user_id');
      $table->unsignedInteger('recipe_id');
      $table->text("comment");
      $table->timestamps();

      $table->foreign('shop_user_id')
        ->references('id')
        ->on('shop_users')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->foreign('recipe_id')
        ->references('id')
        ->on('recipes')
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
    Schema::dropIfExists('comments');
  }
}
