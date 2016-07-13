<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Comment
 *
 * @property integer $id
 * @property string $type
 * @property integer $typeid
 * @property string $date
 * @property integer $userid
 * @property string $comment
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereTypeid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereUserid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereComment($value)
 * @mixin \Eloquent
 */
class Comment extends Model {

    protected $table = "comment";

}
