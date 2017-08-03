<?php

$home = function () {
	$news = \TridentSDK\NewsArticle::orderBy("created_at", "DESC")->paginate(4);
	$tridentSDKCommit = json_decode(\TridentSDK\Config::where("key", "=", "tridentSDKCommit")->first()->value);
	$tridentCommit = json_decode(\TridentSDK\Config::where("key", "=", "tridentCommit")->first()->value);
	$latestPlugins = \TridentSDK\Plugin::whereAccepted(true)->orderBy("updated_at", "DESC")->limit(5)->get();
	$latestPosts = \TridentSDK\ForumPost::latestPosts();

	return view('home.layout', [
		"news" => $news,
		"tridentSDKCommit" => $tridentSDKCommit,
		"tridentCommit" => $tridentCommit,
		"latestPlugins" => $latestPlugins,
		"latestPosts" => $latestPosts
	]);
};

Route::get('/', $home);
Route::get('/home', $home);

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');

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

Route::get('/settings/{id}', function ($id) {
	$user = TridentSDK\User::find($id);

	if(!$user){
		return redirect("/404");
	}

	if(!Auth::check()){
		return redirect("/404");
	}

	if(!Auth::getUser()->canEdit($user)){
		return redirect("/404");
	}

	return view('user.settings', [
		"user" => \TridentSDK\User::find($id),
	]);
});

Route::post('/settings/{id}', "AuthController@settings");

Route::get('/forum', 'ForumController@index');
Route::get('/forum/category/{id}', 'ForumController@category');
Route::get('/forum/topic/{id}', 'ForumController@topic');
Route::get('/forum/edit/{id}', 'ForumController@editPost');
Route::post('/forum/edit/{id}/save', 'ForumController@savePost');
Route::get('/forum/new/topic/{category}', 'ForumController@newTopic');
Route::post('/forum/new/topic/{category}/post', 'ForumController@postTopic');
Route::post('/forum/new/post/{topic}/post', 'ForumController@postPost');
Route::get('/forum/post/{post}/delete', 'ForumController@deletePost');
Route::get('/forum/topic/{topic}/delete', 'ForumController@deleteTopic');
Route::get('/forum/topic/{topic}/move/{category}', 'ForumController@moveTopic');

Route::post('/github/{token}', function ($token){
	if($token == $_ENV["GITHUB_TRIDENT_KEY"]){
		$commit = (json_decode($GLOBALS["HTTP_RAW_POST_DATA"])->commits[0]);
		unset($commit->committer);
		unset($commit->added);
		unset($commit->removed);
		unset($commit->modified);
		\DB::table("config")->where("key", "=", "tridentCommit")->update(["value" => json_encode($commit)]);
	}else if($token == $_ENV["GITHUB_TRIDENTSDK_KEY"]){
		$commit = (json_decode($GLOBALS["HTTP_RAW_POST_DATA"])->commits[0]);
		unset($commit->committer);
		unset($commit->added);
		unset($commit->removed);
		unset($commit->modified);
		\DB::table("config")->where("key", "=", "tridentSDKCommit")->update(["value" => json_encode($commit)]);
	}
});

Route::get("/article/{id}", function ($id){
	$article = \TridentSDK\NewsArticle::find($id);

	if(!isset($article)){
		return redirect("/404/");
	}

	return view('home.news.layout', [
		"article" => $article,
	]);
});

Route::get("/404/", function(){
	return view('errors.404');
});

Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name("password.reset");
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

Route::get("/plugins/", "PluginController@list");