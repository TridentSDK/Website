<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * TridentSDK\ForumPost
 *
 * @property integer $id
 * @property integer $userid
 * @property string $text
 * @property integer $topic
 * @property integer $lastuserid
 * @property boolean $deleted
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost latest($count = 5)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost innerTopic()
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereUserid($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereTopic($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereLastuserid($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereDeleted($value)
 * @mixin \Eloquent
 */
class ForumPost extends Model {

    use SoftDeletes;

    private static $postsPerPage = 10;
    protected $table = "forum_post";

    function getPage() {
        return \Cache::remember('topic_page-'.$this->id, 1, function(){
            return ceil(ForumPost::where("topic", "=", $this->topic)->count() / ForumPost::$postsPerPage);
        });
    }

    function user(){
        return \Cache::remember('user-'.$this->userid, 0, function(){
            return User::find($this->userid);
        });
    }

    /**
     * @return ForumTopic|null
     */
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

    function url(){
        $page = $this->getPage();
        return "/forum/topic/".$this->topic.($page > 1 ? "?page=".$page : "")."#post-".$this->id;
    }

    /**
     * @param User $user
     * @return bool
     */
    function canBeEditedBy(User $user){
        if($user->id == $this->userid || $user->rank()->isModerator()){
            return true;
        }

        return false;
    }

    /**
     * @param int $count
     * @return array|\Illuminate\Database\Eloquent\Collection|static[]
     */
    static function latestPosts($count = 5){
        return ForumPost::selectRaw("`forum_post`.* 
            FROM `forum_post` 
            INNER JOIN (SELECT *, max(`created_at`) AS `latest` FROM `forum_post` GROUP BY `topic` ORDER BY `created_at` DESC) `grouped`
            ON `forum_post`.`created_at` = `grouped`.`latest`
            ORDER BY id DESC
            LIMIT ".$count."#")->get(); // That hash is necessary, Laravel adds stuff after, there should be a toggle for this
    }

}
