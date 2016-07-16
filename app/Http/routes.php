<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');

Route::get('/home', function () {
    $news = \TridentSDK\NewsArticle::orderBy("date", "DESC")->paginate(4);
    $tridentSDKCommit = json_decode(\TridentSDK\Config::where("key", "=", "tridentSDKCommit")->first()->value);
    $tridentCommit = json_decode(\TridentSDK\Config::where("key", "=", "tridentCommit")->first()->value);
    $latestPlugins = \TridentSDK\Plugin::where("accepted", "=", 1)->orderBy("lastupdate", "DESC")->limit(5)->get();
    $latestPosts = \TridentSDK\ForumPost::latest()->get();

    return view('home.layout', [
        "news" => $news,
        "tridentSDKCommit" => $tridentSDKCommit,
        "tridentCommit" => $tridentCommit,
        "latestPlugins" => $latestPlugins,
        "latestPosts" => $latestPosts
    ]);
});

Route::get('/members', function () {
    $members = \TridentSDK\User::orderBy("id", "ASC")->paginate(18);

    return view('members.layout', [
        "members" => $members,
    ]);
});

Route::get('/download', function () {
    $stableUrl = \TridentSDK\Config::find("stable_url")->value;
    $unstableUrl = \TridentSDK\Config::find("unstable_url")->value;
    $bleedingUrl = \TridentSDK\Config::find("bleeding_url")->value;

    return view('download.layout', [
        "version" => array(
            "stable" => array(
                "version" => \TridentSDK\Config::find("stable_version")->value,
                "url" => $stableUrl,
                "message" => $stableUrl == "#" ? "Unavailable" : "Here",
            ),
            "unstable" => array(
                "version" => \TridentSDK\Config::find("unstable_version")->value,
                "url" => $unstableUrl,
                "message" => $unstableUrl == "#" ? "Unavailable" : "Here",
            ),
            "bleeding" => array(
                "version" => \TridentSDK\Config::find("bleeding_version")->value,
                "url" => $bleedingUrl,
                "message" => $bleedingUrl == "#" ? "Unavailable" : "Here",
            )
        ),
    ]);
});