<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftdelete extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('comment', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('denial', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('forum_post', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('forum_topic', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('message', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('news_article', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('plugin', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('plugin_version', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('user', function (Blueprint $table) {
            $table->softDeletes();
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
