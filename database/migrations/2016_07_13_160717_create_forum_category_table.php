<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForumCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('forum_category', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('name', 65535);
			$table->integer('parent')->default(0);
			$table->integer('rank')->default(0);
			$table->integer('order');
			$table->integer('lastpost');
			$table->integer('topics');
			$table->integer('posts');
			$table->text('description', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('forum_category');
	}

}
