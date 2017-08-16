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
 * @property string $deleted_at
 * @property string $post_type
 * @property integer $topic_moved_from
 * @property integer $topic_moved_to
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost wherePostType($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereTopicMovedFrom($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereTopicMovedTo($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost existsTopic()
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPost topicCategory($category)
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
        return \Cache::remember('post_page-'.$this->id, 1, function(){
            $query = \DB::select("SELECT id FROM forum_post WHERE topic = ? AND deleted_at is null ORDER BY created_at ASC", [$this->topic]);

            $i = 0;
            foreach ($query as $v){
                if($v->id == $this->id){
                    return ceil($i / ForumPost::$postsPerPage);
                }

                $i++;
            }

            return 1;
        });
    }

    function user(){
        return \Cache::remember('user-'.$this->userid, 0, function(){
            $user = User::find($this->userid);

            if(is_null($user)){
                $user = User::DeletedUser();
            }

            return $user;
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

    function scopeExistsTopic(Builder $query){
        return $query->whereExists(function ($query){
            $query->select(\DB::raw(1))
                ->from("forum_topic")
                ->whereRaw("id = forum_post.topic")
                ->whereNull("deleted_at");
        });
    }

    function scopeTopicCategory(Builder $query, $category){
        return $query->whereExists(function ($query) use ($category) {
            $query->select(\DB::raw(1))
                ->from("forum_topic")
                ->whereRaw("id = forum_post.topic")
                ->whereNull("deleted_at")
                ->where("category", "=", $category);
        })->whereNull("deleted_at");
    }

    function lastUser(){
        return \Cache::remember('user-'.$this->lastuserid, 0, function(){
            $user = User::find($this->lastuserid);

            if(is_null($user)){
                $user = User::DeletedUser();
            }

            return $user;
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

    function likedBy(User $user){
        return ForumPostLike::whereUserid($user->id)->wherePostid($this->id)->exists();
    }

    function likeCount(){
        return ForumPostLike::wherePostid($this->id)->count();
    }

    /**
     * @param int $count
     * @return array|\Illuminate\Database\Eloquent\Collection|static[]
     */
    static function latestPosts($count = 5){
        if(!is_int($count)){
            throw new \InvalidArgumentException("count argument was not an integer");
        }

        return ForumPost::selectRaw("forum_post.* 
            FROM forum_post 
            INNER JOIN (SELECT *, max(created_at) AS latest FROM forum_post GROUP BY topic, id ORDER BY created_at DESC) grouped
            ON forum_post.created_at = grouped.latest
            WHERE EXISTS (select 1 from forum_topic where id = forum_post.topic and deleted_at is null)
            AND forum_post.deleted_at is null
            AND forum_post.post_type = 'NORMAL'
            ORDER BY id DESC
            LIMIT ".$count."--")->get(); // That dash dash is necessary, Laravel adds stuff after, there should be a toggle for this
    }

}
