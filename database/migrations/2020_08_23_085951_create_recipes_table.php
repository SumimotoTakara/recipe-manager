<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('recipes', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger("shop_id");
      $table->enum('category', ['salad', 'meat', 'fried', 'dessert']);
      $table->string("name");
      $table->string('image');
      $table->text("description");
      $table->timestamps();

      $table->foreign('shop_id')
        ->references('id')
        ->on('shops')
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
    Schema::dropIfExists('recipes');
  }
}
