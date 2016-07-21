<?php

namespace TridentSDK\Http\Controllers;

use Illuminate\Support\Facades\Input;
use TridentSDK\ForumCategory;
use TridentSDK\ForumPost;
use TridentSDK\ForumTopic;
use TridentSDK\Http\Requests;

class ForumController extends Controller {

    public function index(){
        return view('forum.index', [
            "categories" => \TridentSDK\ForumCategory::whereParent(0)->orderBy("rank", "DESC")->get()
        ]);
    }
    
    public function category($id){
        if(!is_numeric($id)){
            return redirect("/forum");
        }

        $category = \TridentSDK\ForumCategory::find($id);

        if($category == null){
            return redirect("/forum");
        }

        return view('forum.category', [
            "category" => $category,
            "breadcrumbs" => $category->breadCrumbs(true)
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

    public function newTopic($category){
        if(!is_numeric($category)){
            return redirect("/forum");
        }

        $category = \TridentSDK\ForumCategory::find($category);

        if($category == null || !\Auth::check()){
            return redirect("/forum");
        }

        return view('forum.new-topic');
    }

    public function postTopic($category){
        if(!is_numeric($category)){
            return redirect("/forum");
        }

        $category = \TridentSDK\ForumCategory::find($category);

        if($category == null || !\Auth::check()){
            return redirect("/forum");
        }

        if(empty(trim(strip_tags(\Request::get("topic_title"))))){
            return redirect()->back()->withInput(Input::all())->withErrors("Topic title can't be empty!", "topic");
        }

        if(empty(trim(strip_tags(\Request::get("topic_text"))))){
            return redirect()->back()->withInput(Input::all())->withErrors("Topic text can't be empty!", "topic");
        }

        $topic = new ForumTopic();
        $topic->name = e(\Request::get("topic_title"));
        $topic->user = \Auth::user()->id;
        $topic->category = $category->id;
        $topic->save();

        $post = new ForumPost();
        $post->userid = \Auth::user()->id;
        $post->text = \Request::get("topic_text");
        $post->topic = $topic->id;
        $post->save();

        return view('forum.topic-posted', [
            "url" => "/forum/topic/".$topic->id,
        ]);
    }

    public function postPost($topic){
        if(!is_numeric($topic)){
            return redirect("/forum");
        }

        $topic = \TridentSDK\ForumPost::find($topic);

        if($topic == null || !\Auth::check()){
            return redirect("/forum");
        }

        if(empty(trim(strip_tags(\Request::get("post_text"))))){
            return redirect()->back()->withInput(Input::all())->withErrors("Topic text can't be empty!", "post");
        }

        $post = new ForumPost();
        $post->userid = \Auth::user()->id;
        $post->text = \Request::get("post_text");
        $post->topic = $topic->id;
        $post->save();

        $url = "/forum/topic/".$topic->id;
        $page = $post->getPage();

        if($page > 1){
            $url .= "?page=".$page;
        }

        $url .= "#post-".$post->id;

        return redirect($url);
    }

}
