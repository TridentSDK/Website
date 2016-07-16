<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserAddRememberTimestamps extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('user', function (Blueprint $table) {
            $table->rememberToken();
            $table->timestamps();
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
