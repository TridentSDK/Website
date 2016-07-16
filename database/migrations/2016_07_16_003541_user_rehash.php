<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserRehash extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('user', function (Blueprint $table) {
            $table->boolean('rehashed');
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
