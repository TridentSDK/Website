<?php

namespace TridentSDK\Providers;

use Captcha\Captcha;
use Illuminate\Support\ServiceProvider;
use TridentSDK\ForumPost;
use TridentSDK\ForumTopic;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){
        ini_set("xdebug.var_display_max_depth", 5);

        $captcha = new Captcha();
        $captcha->setPublicKey($_ENV["RECAPTCHA_PUBLIC"]);
        $captcha->setPrivateKey($_ENV["RECAPTCHA_SECRET"]);

        if(!isset($_SERVER['REMOTE_ADDR'])){
            $captcha->setRemoteIp('192.168.1.1');
        }

        view()->share("captcha", $captcha);

        view()->share('navigation_menu_items', array(
            "Forum"    => "/forum",
            "Members"  => "/members",
            "Plugins"  => "/plugins",
            "GitHub"   => "https://github.com/TridentSDK/",
            "Jira"     => "https://tridentsdk.atlassian.net/",
            "Chat"     => "https://telegram.me/tridentsdk",
            "Download" => "/download",
            "Docs"     => array(
                "Rules"         => "/rules",
                "Documentation" => "http://docs.tridentsdk.net/",
                "Tech-Doc"      => "/techdoc",
                "Javadocs"      => "https://tridentsdk.github.io/javadocs/",
                "Wiki"          => "https://tridentsdkwiki.atlassian.net/",
                "FAQ"           => "/faq",
                "Web API"       => "https://apidocs.tridentsdk.net/"
            )
        ));

        ForumPost::created(function (ForumPost $post){
            $post->topic()->category()->newPost($post->id);
        });

        ForumTopic::created(function (ForumTopic $topic){
            $topic->category()->newTopic($topic);
        });

        if(!\Auth::check() || \Auth::user()->developer == false){
            \Debugbar::disable();
        }
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
