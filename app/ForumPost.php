<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * TridentSDK\ForumPost
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $date
 * @property string $text
 * @property integer $topic
 * @property integer $lastedit
 * @property integer $lastuserid
 * @property boolean $deleted
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereUserid($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereTopic($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereLastedit($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereLastuserid($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereDeleted($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost latest($count = 5)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost innerTopic()
 */
class ForumPost extends Model {

    private static $postsPerPage = 10;
    protected $table = "forum_post";

    function getPage() {
        return ceil(ForumPost::where("topic", "=", $this->topic)->count() / ForumPost::$postsPerPage);
    }

    function user(){
        return \Cache::remember('user-'.$this->userid, 0, function(){
            return User::find($this->userid);
        });
    }

    function topic(){
        return \Cache::remember('forum_topic-'.$this->topic, 0, function(){
            return ForumTopic::find($this->topic);
        });
    }

    function scopeLatest(Builder $query, $count = 5){
        return $query->where("deleted", "=", 0)->groupBy("topic")->orderBy("created_at", "DESC")->limit($count);
    }

    function scopeInnerTopic(Builder $query){
        return $query->join("forum_topic", "forum_post.topic", "=", "forum_topic.id")->where("forum_post.deleted", "=", false)->where("forum_topic.deleted", "=", false);
    }

    function lastUser(){
        return \Cache::remember('user-'.$this->lastuserid, 0, function(){
            return User::find($this->lastuserid);
        });
    }

}
