<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;

/**
 * TridentSDK\ForumPostLike
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $postid
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPostLike whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPostLike whereUserid($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPostLike wherePostid($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPostLike whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumPostLike whereUpdatedAt($value)
 */
class ForumPostLike extends Model {

    protected $table = "forum_post_like";

}
