<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ForumPost
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $date
 * @property string $text
 * @property integer $topic
 * @property integer $lastedit
 * @property integer $lastuserid
 * @property boolean $deleted
 * @method static \Illuminate\Database\Query\Builder|\App\ForumPost whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumPost whereUserid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumPost whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumPost whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumPost whereTopic($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumPost whereLastedit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumPost whereLastuserid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumPost whereDeleted($value)
 * @mixin \Eloquent
 */
class ForumPost extends Model {

    private static $postsPerPage = 10;
    protected $table = "forum_post";

    function getPage() {
        return ceil(ForumPost::where("topic", "=", $this->topic)->count() / ForumPost::$postsPerPage);
    }

    function getUser(){
        return User::find($this->userid);
    }

    function getTopic(){
        return ForumTopic::find($this->topic);
    }

}
