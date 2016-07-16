<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReInsertConfigData extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        DB::table("config")->delete();
        DB::table("config")->insert(array(
            array("key" => "debug", "value" => "0"),
            array("key" => "TodoList", "value" => ""),
            array("key" => "RuleList", "value" => ""),
            array("key" => "allowPluginCreation", "value" => "on"),
            array("key" => "tridentSDKCommit", "value" => "{\"id\":\"8511f0ab3c270745f59d1ca4f8f041dc245f7ade\",\"tree_id\":\"646f0a7e053d314db1266c5c8231a8d7afcd9bac\",\"distinct\":true,\"message\":\"Start revamping Trident\n\nAdd configs, logging, basic infrastructure, method stubs, noted TODOS\n\nI want this to be a commit to review with the team so far as to what direction development will proceed\",\"timestamp\":\"2016-07-11T22:24:30-07:00\",\"url\":\"https:\/\/github.com\/TridentSDK\/TridentSDK\/commit\/8511f0ab3c270745f59d1ca4f8f041dc245f7ade\",\"author\":{\"name\":\"AgentTroll\",\"email\":\"woodyc40@gmail.com\",\"username\":\"AgentTroll\"}}"),
            array("key" => "tridentCommit", "value" => "{\"id\":\"610489c9b8ec15f2e0fc83d2fa9c712a5579d822\",\"tree_id\":\"c3987ddaaad52c69baff17b71e5340a78b9baeb3\",\"distinct\":true,\"message\":\"Start revamping Trident\n\nAdd configs, logging, basic infrastructure, method stubs, noted TODOS\n\nI want this to be a commit to review with the team so far as to what direction development will proceed\",\"timestamp\":\"2016-07-11T22:24:30-07:00\",\"url\":\"https:\/\/github.com\/TridentSDK\/Trident\/commit\/610489c9b8ec15f2e0fc83d2fa9c712a5579d822\",\"author\":{\"name\":\"AgentTroll\",\"email\":\"woodyc40@gmail.com\",\"username\":\"AgentTroll\"}}"),
            array("key" => "TechDoc", "value" => ""),
            array("key" => "stable_version", "value" => "Unavailable"),
            array("key" => "stable_url", "value" => "#"),
            array("key" => "unstable_version", "value" => "Unavailable"),
            array("key" => "unstable_url", "value" => "#"),
            array("key" => "bleeding_version", "value" => "Unavailable"),
            array("key" => "bleeding_url", "value" => "#"),
            array("key" => "FaqList", "value" => ""),
        ));
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
