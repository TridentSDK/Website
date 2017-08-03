<?php

namespace TridentSDK\Http\Controllers;

use Illuminate\Support\Facades\Input;
use TridentSDK\ForumCategory;
use TridentSDK\ForumPost;
use TridentSDK\ForumTopic;
use TridentSDK\Http\Requests;

class PluginController extends Controller {

    public function list(){
        return view('plugins.layout', [
            "plugins" => \TridentSDK\Plugin::popularPlugins(),
            "filters" => [
                "Admin Tools" => "Iron_Pickaxe.png",
                "Anti-Griefing" => "Iron_Sword.png",
                "Chat Related" => "Paper.png",
                "Developer Tools" => "Disc.png",
                "Economy" => "Emerald.png",
                "Fixes" => "Compass.png",
                "Fun" => "Cake.png",
                "General" => "Apple.png",
                "Informational" => "Sign.png",
                "Mechanics" => "Redstone.png",
                "Miscellaneous" => "Slimeball.png",
                "Role-Playing" => "Book.png",
                "Web Administration" => "Painting.png",
                "World Manipulation" => "Door.png",
                "World Generation" => "Map.png"
            ]
        ]);
    }

}