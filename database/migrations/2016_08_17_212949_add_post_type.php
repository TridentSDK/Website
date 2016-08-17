<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostType extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('forum_post', function (Blueprint $table) {
            $table->enum('post_type', array("NORMAL", "TOPIC_MOVED"))->default("NORMAL");
            $table->integer('topic_moved_from')->default(0);
            $table->integer('topic_moved_to')->default(0);
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
