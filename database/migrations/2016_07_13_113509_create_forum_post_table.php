<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForumPostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('forum_post', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('userid');
			$table->integer('date');
			$table->text('text', 65535);
			$table->integer('topic');
			$table->integer('lastedit')->default(0);
			$table->integer('lastuserid')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('forum_posts');
	}

}
