<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ForumPostLike
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $postid
 * @method static \Illuminate\Database\Query\Builder|\App\ForumPostLike whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumPostLike whereUserid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumPostLike wherePostid($value)
 * @mixin \Eloquent
 */
class ForumPostLike extends Model {

    protected $table = "forum_post_like";

}
