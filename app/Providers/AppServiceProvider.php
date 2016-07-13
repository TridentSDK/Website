<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){
        view()->share('navigation_menu_items', array(
            "Forum" => "/f/",
            "Members" => "/members/",
            "Plugins" => "/plugins/",
            "GitHub" => "https://github.com/TridentSDK/",
            "Jira" => "https://tridentsdk.atlassian.net/",
            "Chat" => "https://telegram.me/tridentsdk",
            "Download" => "/download/",
            "Docs" => array(
                "Rules" => "/rules/",
                "Documentation" => "http://docs.tridentsdk.net/",
                "Tech-Doc" => "/techdoc/",
                "Javadocs" => "https://tridentsdk.github.io/javadocs/",
                "Wiki" => "https://tridentsdkwiki.atlassian.net/",
                "FAQ" => "/faq/",
                "Web API" => "https://apidocs.tridentsdk.net/"
            )
        ));

        $page = ""; // TODO Fetch Page

        if($page == "" || empty($page)){
            $page = "Home";
        }

        view()->share("page", $page);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(){
        //
    }
}
