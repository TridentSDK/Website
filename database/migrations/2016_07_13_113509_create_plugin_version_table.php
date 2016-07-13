<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePluginVersionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plugin_version', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('pluginid');
			$table->text('version', 65535);
			$table->text('filename', 65535);
			$table->text('changelog', 65535);
			$table->integer('date');
			$table->text('trident_version', 65535);
			$table->text('md5_hash', 65535);
			$table->integer('downloads')->default(0);
			$table->boolean('accepted')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plugin_version');
	}

}
