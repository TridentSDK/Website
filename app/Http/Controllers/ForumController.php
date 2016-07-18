<?php

namespace TridentSDK\Http\Controllers;

use TridentSDK\ForumCategory;
use TridentSDK\Http\Requests;

class ForumController extends Controller {

    public function index(){
        return view('techdoc.layout', [
            "doc" => \TridentSDK\Config::find("TechDoc")->value,
        ]);
    }

    public function topic($id){
        if(!is_numeric($id)){
            return redirect("/forum");
        }

        $topic = \TridentSDK\ForumTopic::find($id);

        if($topic == null){
            return redirect("/forum");
        }

        $posts = $topic->posts(true);
        $enum = $posts->currentPage() * $posts->perPage() - $posts->perPage() + 1;
        $breadcrumbs = ForumCategory::find($topic->category)->breadCrumbs();
        $breadcrumbs[$topic->name] = "#";

        return view('forum.topic', [
            "topic" => $topic,
            "posts" => $posts,
            "enum" => $enum,
            "breadcrumbs" => $breadcrumbs
        ]);
    }

    public function editPost($id){
        if(!is_numeric($id)){
            return redirect("/forum");
        }

        $post = \TridentSDK\ForumPost::find($id);

        if($post == null){
            return redirect("/forum");
        }

        if(!\Auth::user() || (\Auth::user()->id != $post->userid && \Auth::user()->rank < 100)){
            return redirect("/forum/topic/".$post->topic);
        }

        return view('forum.edit-post', [
            "post" => $post,
        ]);
    }

    public function savePost($id){
        if(!is_numeric($id)){
            return redirect("/forum");
        }

        $post = \TridentSDK\ForumPost::find($id);

        if($post == null){
            return redirect("/forum");
        }

        if(!\Auth::user() || (\Auth::user()->id != $post->userid && \Auth::user()->rank < 100)){
            return redirect("/forum/topic/".$post->topic);
        }

        $text = \Request::get("edit_post");

        if($text == null || trim(strip_tags($text)) == ""){
            return redirect("/forum/edit/".$id)->withErrors("Post can't be empty!", "post");
        }

        $post->text = $text;
        $post->lastuserid = \Auth::user()->id;
        $post->save();

        $url = "/forum/topic/".$post->topic;
        $page = $post->getPage();

        if($page > 1){
            $url .= "?page=".$page;
        }

        $url .= "#post-".$post->id;

        return view('forum.edit-post-saved', [
            "url" => $url,
        ]);
    }

}
