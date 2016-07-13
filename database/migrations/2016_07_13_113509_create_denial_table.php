<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDenialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('denial', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('type', 65535);
			$table->integer('typeid');
			$table->text('reason', 65535);
			$table->integer('user');
			$table->integer('date');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('denial');
	}

}
