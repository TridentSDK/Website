<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPluginVersionDependency extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('plugin_version_dependency', function (Blueprint $table){
			$table->timestamps();
			$table->integer('id', true);
			$table->integer('plugin_id')->index();
			$table->integer('version_id')->index();
			$table->text('dependency_space', 32);
			$table->text('dependency_name', 32);
			$table->text('dependency_version', 16);
			$table->enum('comparator', array("", ">", ">=", "<", "<=", "~"))->default("");
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
