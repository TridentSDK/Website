<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * TridentSDK\ForumTopic
 *
 * @property integer $id
 * @property string $name
 * @property integer $user
 * @property integer $category
 * @property integer $lastuser
 * @property boolean $sticky
 * @property boolean $deleted
 * @property integer $locked
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereUser($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereCategory($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereLastuser($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereSticky($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereDeleted($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereLocked($value)
 * @mixin \Eloquent
 */
class ForumTopic extends Model {

    use SoftDeletes;

    protected $table = "forum_topic";

    public function posts($paged = false, $perPage = 10){
        if(!$paged){
            return ForumPost::whereTopic($this->id)->whereDeleted(false)->get();
        }else{
            return ForumPost::whereTopic($this->id)->whereDeleted(false)->paginate($perPage);
        }
    }

    public function url(){
        return "/forum/topic/".$this->id;
    }

    /**
     * @return int
     */
    public function replyCount(){
        return \Cache::remember('replyCount-'.$this->id, 0, function(){
            return ForumPost::whereTopic($this->id)->count() - 1;
        });
    }

    /**
     * @return ForumPost|null
     */
    public function lastReply(){
        if($this->replyCount() == 0){
            return null;
        }

        return ForumPost::whereTopic($this->id)->orderBy("created_at", "DESC")->first();
    }

    /**
     * @return ForumCategory|null
     */
    public function category(){
        return \Cache::remember('category-'.$this->category, 0, function(){
            return ForumCategory::find($this->category);
        });
    }

}
