<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimeColumns extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        try{
            Schema::table('comment', function (Blueprint $table) {
                $table->timestamps();
            });
        }catch (Exception $e){}

        try{
            Schema::table('denial', function (Blueprint $table) {
                $table->timestamps();
            });
        }catch (Exception $e){}

        try{
            Schema::table('forum_post_like', function (Blueprint $table) {
                $table->timestamps();
            });
        }catch (Exception $e){}

        try{
            Schema::table('forum_post', function (Blueprint $table) {
                $table->timestamps();
            });
        }catch (Exception $e){}

        try{
            Schema::table('forum_topic', function (Blueprint $table) {
                $table->timestamps();
            });
        }catch (Exception $e){}

        try{
            Schema::table('log', function (Blueprint $table) {
                $table->timestamps();
            });
        }catch (Exception $e){}

        try{
            Schema::table('message', function (Blueprint $table) {
                $table->timestamps();
            });
        }catch (Exception $e){}

        try{
            Schema::table('news_article', function (Blueprint $table) {
                $table->timestamps();
            });
        }catch (Exception $e){}

        try{
            Schema::table('plugin', function (Blueprint $table) {
                $table->timestamps();
            });
        }catch (Exception $e){}

        try{
            Schema::table('plugin_version', function (Blueprint $table) {
                $table->timestamps();
            });
        }catch (Exception $e){}

        DB::update("UPDATE comment SET comment.created_at = FROM_UNIXTIME(comment.date)");
        DB::update("UPDATE denial SET denial.created_at = FROM_UNIXTIME(denial.date)");
        DB::update("UPDATE forum_post SET forum_post.created_at = FROM_UNIXTIME(forum_post.date)");
        DB::update("UPDATE forum_post SET forum_post.updated_at = FROM_UNIXTIME(forum_post.lastedit)");
        DB::update("UPDATE forum_topic SET forum_topic.created_at = FROM_UNIXTIME(forum_topic.date)");
        DB::update("UPDATE forum_topic SET forum_topic.updated_at = FROM_UNIXTIME(forum_topic.lastupdate)");
        DB::update("UPDATE message SET message.created_at = FROM_UNIXTIME(message.date)");
        DB::update("UPDATE message SET message.updated_at = FROM_UNIXTIME(message.lastedit)");
        DB::update("UPDATE news_article SET news_article.created_at = FROM_UNIXTIME(news_article.date)");
        DB::update("UPDATE plugin SET plugin.created_at = FROM_UNIXTIME(plugin.creationdate)");
        DB::update("UPDATE plugin SET plugin.updated_at = FROM_UNIXTIME(plugin.lastupdate)");
        DB::update("UPDATE plugin_version SET plugin_version.created_at = FROM_UNIXTIME(plugin_version.date)");

        Schema::table('comment', function (Blueprint $table) {
            $table->dropColumn('date');
        });

        Schema::table('denial', function (Blueprint $table) {
            $table->dropColumn('date');
        });

        Schema::table('forum_post', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('lastedit');
        });

        Schema::table('forum_topic', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('lastupdate');
        });

        Schema::table('message', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('lastedit');
        });

        Schema::table('news_article', function (Blueprint $table) {
            $table->dropColumn('date');
        });

        Schema::table('plugin', function (Blueprint $table) {
            $table->dropColumn('creationdate');
            $table->dropColumn('lastupdate');
        });

        Schema::table('plugin_version', function (Blueprint $table) {
            $table->dropColumn('date');
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
