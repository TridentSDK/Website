<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePluginTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plugin', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('userid');
			$table->integer('creationdate');
			$table->text('name', 65535);
			$table->integer('lastupdate');
			$table->text('description', 65535);
			$table->text('logo', 65535);
			$table->text('latestversion', 65535);
			$table->boolean('hidden')->default(0);
			$table->integer('views')->default(0);
			$table->integer('favourites')->default(0);
			$table->integer('downloads')->default(0);
			$table->boolean('accepted')->default(0);
			$table->text('website', 65535);
			$table->text('fulldescription', 65535);
			$table->text('repo_display_url', 65535);
			$table->text('repo_clone_url', 65535);
			$table->text('primary', 65535);
			$table->text('secondary', 65535);
			$table->integer('license')->default(7);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plugin');
	}

}
