<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('username', 65535);
			$table->text('password', 65535);
			$table->text('salt', 65535);
			$table->text('email', 65535)->nullable();
			$table->text('mcusername', 65535)->nullable();
			$table->integer('rank')->default(0);
			$table->text('avatar', 65535)->nullable();
			$table->boolean('allow_review')->default(0);
			$table->integer('last_online');
			$table->integer('creation_date');
			$table->string('first_ip', 15);
			$table->string('last_ip', 15);
			$table->string('validation_code', 64);
			$table->boolean('validated');
			$table->boolean('send_emails');
			$table->string('token', 64);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}
