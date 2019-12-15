<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('restaurant_id');
            $table->unsignedInteger('category_id');
            $table->text('title');
            $table->text('small_detail')->nullable();
            $table->text('main_detail')->nullable();
            $table->text('img');
            $table->string('price');
            $table->text('labels')->nullable();
            $table->timestamps();
//
//            $table->foreign('category_id')
//	           ->references('id')
//	            ->on('categories')
//	            ->onDelete('cascade');
//
//            $table->foreign('restaurant_id')
//	           ->references('id')
//	           ->on('restaurants')
//	           ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods');
    }
}
