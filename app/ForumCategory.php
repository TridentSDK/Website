<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ForumCategory
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent
 * @property integer $rank
 * @property integer $order
 * @property integer $lastpost
 * @property integer $topics
 * @property integer $posts
 * @property string $description
 * @method static \Illuminate\Database\Query\Builder|\App\ForumCategory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumCategory whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumCategory whereParent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumCategory whereRank($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumCategory whereOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumCategory whereLastpost($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumCategory whereTopics($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumCategory wherePosts($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumCategory whereDescription($value)
 * @mixin \Eloquent
 */
class ForumCategory extends Model {

    protected $table = "forum_category";

}
