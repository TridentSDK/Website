<?php

namespace TridentSDK\Http\Controllers;

use Illuminate\Http\Request;
use TridentSDK\Enums\ApiError;
use TridentSDK\ForumPost;
use TridentSDK\ForumPostLike;

class ApiControllerV1 extends Controller {

    public function __construct(){
        $this->middleware("token", ['only' => [
            'readDropdown'
        ]]);
    }

    public function readDropdown(){
        \Auth::user()->readLatestNotifications();
        return response()->json(["success" => true]);
    }

}
