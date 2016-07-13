<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForumTopicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('forum_topic', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('name', 65535);
			$table->integer('user');
			$table->integer('date');
			$table->integer('category');
			$table->integer('lastupdate')->default(0);
			$table->integer('lastuser')->default(0);
			$table->boolean('sticky')->default(0);
			$table->boolean('deleted')->default(0);
			$table->integer('locked')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('forum_topic');
	}

}
