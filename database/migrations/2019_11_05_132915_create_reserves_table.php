<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('restaurant_id');
            $table->string('start_time');
            $table->string('end_time');
            $table->text('detail')->nullable();
            $table->string('tables');
            $table->string('name');
            $table->string('phone',15);
            $table->string('trans_id')->nullable();
            $table->timestamps();
//
//	        $table->foreign('user_id')
//		        ->references('id')
//		        ->on('users')
//		        ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserves');
    }
}
