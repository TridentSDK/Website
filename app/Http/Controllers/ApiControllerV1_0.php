<?php

namespace TridentSDK\Http\Controllers;

use Illuminate\Http\Request;
use TridentSDK\Enums\ApiError;
use TridentSDK\ForumPost;
use TridentSDK\ForumPostLike;

class ApiControllerV1_0 extends Controller {

    public function __construct(){
        $this->middleware("token", ['only' => [
            'likePost',
            'dislikePost',
        ]]);
    }

    public function likePost(Request $request){
        if(!$request->has("post")){
            return response()->json(ApiError::POST_ID_NOT_PROVIDED, 400);
        }

        $post = ForumPost::find($request->get("post"));

        if($post == null){
            return response()->json(ApiError::POST_NOT_FOUND, 400);
        }

        $like = ForumPostLike::whereUserid(\Auth::user()->id)->wherePostid($post->id)->first();

        if($like != null){
            return response()->json(ApiError::POST_ALREADY_LIKED, 400);
        }

        $like = new ForumPostLike();
        $like->userid = \Auth::user()->id;
        $like->postid = $request->get("post");
        $like->save();

        return response()->json(["success" => true]);
    }

    public function dislikePost(Request $request){
        if(!$request->has("post")){
            return response()->json(ApiError::POST_ID_NOT_PROVIDED, 400);
        }

        $post = ForumPost::find($request->get("post"));

        if($post == null){
            return response()->json(ApiError::POST_NOT_FOUND, 400);
        }

        $like = ForumPostLike::whereUserid(\Auth::user()->id)->wherePostid($post->id)->first();

        if($like == null){
            return response()->json(ApiError::POST_NOT_LIKED, 400);
        }

        $like->delete();

        return response()->json(["success" => true]);
    }

    public function postLikeCount(Request $request){
        if(!$request->has("post")){
            return response()->json(ApiError::POST_ID_NOT_PROVIDED, 400);
        }

        $post = ForumPost::find($request->get("post"));

        if($post == null){
            return response()->json(ApiError::POST_NOT_FOUND, 400);
        }

        return response()->json(["success" => "true", "count" => $post->likeCount()]);
    }

}
