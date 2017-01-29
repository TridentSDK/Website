<?php

Route::get("/post/like/", "ApiControllerV1@likePost");
Route::get("/post/dislike/", "ApiControllerV1@dislikePost");
Route::get("/notifications/read/dropdown/", "ApiControllerV1@readDropdown");