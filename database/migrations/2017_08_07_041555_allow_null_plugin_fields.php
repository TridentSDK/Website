<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllowNullPluginFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plugin', function (Blueprint $table) {
            $table->text('latestversion', 14)->nullable()->change();
            $table->text('repo_display_url', 65535)->nullable()->change();
            $table->text('repo_clone_url', 65535)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
