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

Route::get('/home', function () {
    $news = \App\NewsArticle::orderBy("date", "DESC")->paginate(4);
    $tridentSDKCommit = json_decode(\App\Config::where("key", "=", "tridentSDKCommit")->first()->value);
    $tridentCommit = json_decode(\App\Config::where("key", "=", "tridentCommit")->first()->value);
    $latestPlugins = \App\Plugin::where("accepted", "=", 1)->orderBy("lastupdate", "DESC")->limit(5)->get();
    $latestPosts = \App\ForumPost::groupBy("topic")->orderBy("date", "DESC")->limit(5)->get();

    return view('home.layout', [
        "news" => $news,
        "tridentSDKCommit" => $tridentSDKCommit,
        "tridentCommit" => $tridentCommit,
        "latestPlugins" => $latestPlugins,
        "latestPosts" => $latestPosts
    ]);
});
