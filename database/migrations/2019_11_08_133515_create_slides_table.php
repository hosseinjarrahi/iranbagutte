<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('restaurant_id');
            $table->text('img');
            $table->timestamps();
//
//            $table->foreign('category_id')
//	            ->references('id')
//	            ->on('categories')
//	            ->onDelete('cascade');
//
//            $table->foreign('restaurant_id')
//	            ->references('id')
//	            ->on('restaurants')
//	            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slides');
    }
}
