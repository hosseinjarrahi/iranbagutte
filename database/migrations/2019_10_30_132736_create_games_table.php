<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up ()
	{
		Schema::create('games' , function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedInteger('user_id');
			$table->unsignedTinyInteger('status');
			$table->text('file');
			$table->text('name')->nullable();
			$table->text('description')->nullable();
			$table->text('poster')->nullable();
			$table->string('part',2);
			$table->integer('price');
			$table->text('full')->nullable();
			$table->timestamps();

//
//			$table->foreign('user_id')
//				->references('id')
//				->on('users')
//				->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down ()
	{
		Schema::dropIfExists('games');
	}
}
