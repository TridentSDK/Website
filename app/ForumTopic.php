<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;

/**
 * TridentSDK\ForumTopic
 *
 * @property integer $id
 * @property string $name
 * @property integer $user
 * @property integer $date
 * @property integer $category
 * @property integer $lastupdate
 * @property integer $lastuser
 * @property boolean $sticky
 * @property boolean $deleted
 * @property integer $locked
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereUser($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereCategory($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereLastupdate($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereLastuser($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereSticky($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereDeleted($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereLocked($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereUpdatedAt($value)
 */
class ForumTopic extends Model {

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

    public function replyCount(){
        return ForumPost::whereTopic($this->id)->count() - 1;
    }

    public function lastReply(){
        return ForumPost::whereTopic($this->id)->orderBy("created_at", "DESC")->skip(1)->first();
    }

}
