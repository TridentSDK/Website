<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPluginSpace extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('plugin_space', function (Blueprint $table){
			$table->timestamps();
			$table->integer('id', true);
			$table->integer('entity_id')->index();
			$table->boolean('organisation')->default(false);
			$table->text("name", 32);
		});

		Schema::table('plugin', function (Blueprint $table) {
			$table->integer('space')->index();
			$table->text('artifact', 32);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){
		//
	}

}
