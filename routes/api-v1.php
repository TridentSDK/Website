<?php

Route::get("/post/like/", "API\V1\PostController@likePost");
Route::get("/post/dislike/", "API\V1\PostController@dislikePost");

Route::get("/notifications/read/dropdown/", "ApiControllerV1@readDropdown");

Route::get("/plugin/{space}/{plugin}", "API\V1\PluginController@find");