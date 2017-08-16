<?php

namespace TridentSDK\Utils;


class Menu {

    static $navigation_menu_items = array(
        "Forum"    => "/forum",
        "Members"  => "/members",
        "Plugins"  => "/plugins",
        "GitHub"   => "https://github.com/TridentSDK/",
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
    );

}