<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixUserDate extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        DB::update("UPDATE `user` SET `user`.created_at = FROM_UNIXTIME(`user`.creation_date) WHERE TO_SECONDS(`user`.created_at) IS NULL");
        DB::update("UPDATE `user` SET `user`.updated_at = `user`.created_at WHERE TO_SECONDS(`user`.updated_at) IS NULL");

        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('creation_date');
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
