<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsArticleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news_article', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('userid');
			$table->integer('date');
			$table->text('text', 65535);
			$table->text('title', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('news_article');
	}

}
