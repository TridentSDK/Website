<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixUpdated extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        DB::update("UPDATE comment SET comment.updated_at = comment.created_at WHERE TO_SECONDS(comment.updated_at) IS NULL");
        DB::update("UPDATE denial SET denial.updated_at = denial.created_at WHERE TO_SECONDS(denial.updated_at) IS NULL");
        DB::update("UPDATE forum_post SET forum_post.updated_at = forum_post.created_at WHERE TO_SECONDS(forum_post.updated_at) IS NULL");
        DB::update("UPDATE forum_topic SET forum_topic.updated_at = forum_topic.created_at WHERE TO_SECONDS(forum_topic.updated_at) IS NULL");
        DB::update("UPDATE message SET message.updated_at = message.created_at WHERE TO_SECONDS(message.updated_at) IS NULL");
        DB::update("UPDATE news_article SET news_article.updated_at = news_article.created_at WHERE TO_SECONDS(news_article.updated_at) IS NULL");
        DB::update("UPDATE plugin SET plugin.updated_at = plugin.created_at WHERE TO_SECONDS(plugin.updated_at) IS NULL");
        DB::update("UPDATE plugin_version SET plugin_version.updated_at = plugin_version.created_at WHERE TO_SECONDS(plugin_version.updated_at) IS NULL");
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
