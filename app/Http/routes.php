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
    $news = \TridentSDK\NewsArticle::orderBy("created_at", "DESC")->paginate(4);
    $tridentSDKCommit = json_decode(\TridentSDK\Config::where("key", "=", "tridentSDKCommit")->first()->value);
    $tridentCommit = json_decode(\TridentSDK\Config::where("key", "=", "tridentCommit")->first()->value);
    $latestPlugins = \TridentSDK\Plugin::whereAccepted(true)->orderBy("updated_at", "DESC")->limit(5)->get();
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

Route::get('/rules', function () {
    return view('rules.layout', [
        "rules" => \TridentSDK\Config::find("RuleList")->value,
    ]);
});

Route::get('/faq', function () {
    return view('faq.layout', [
        "faq" => \TridentSDK\Config::find("FaqList")->value,
    ]);
});

Route::get('/techdoc', function () {
    return view('techdoc.layout', [
        "doc" => \TridentSDK\Config::find("TechDoc")->value,
    ]);
});

Route::get('/user/{id}', function ($id) {
    return view('user.layout', [
        "user" => \TridentSDK\User::find($id),
    ]);
});

Route::get('/forum', 'ForumController@index');
Route::get('/forum/category/{id}', 'ForumController@category');
Route::get('/forum/topic/{id}', 'ForumController@topic');
Route::get('/forum/edit/{id}', 'ForumController@editPost');
Route::post('/forum/edit/{id}/save', 'ForumController@savePost');
Route::get('/forum/new/topic/{category}', 'ForumController@newTopic');
Route::post('/forum/new/topic/{category}/post', 'ForumController@postTopic');