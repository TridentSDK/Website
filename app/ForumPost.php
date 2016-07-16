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
 */
class ForumPost extends Model {

    private static $postsPerPage = 10;
    protected $table = "forum_post";

    function getPage() {
        return ceil(ForumPost::where("topic", "=", $this->topic)->count() / ForumPost::$postsPerPage);
    }

    function user(){
        return User::find($this->userid);
    }

    function topic(){
        return ForumTopic::find($this->topic);
    }

    function scopeLatest(Builder $query, $count = 5){
        return $query->where("deleted", "=", 0)->groupBy("topic")->orderBy("date", "DESC")->limit($count);
    }

}
