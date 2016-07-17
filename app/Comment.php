<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;

/**
 * TridentSDK\Comment
 *
 * @property integer $id
 * @property string $type
 * @property integer $typeid
 * @property string $date
 * @property integer $userid
 * @property string $comment
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Comment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Comment whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Comment whereTypeid($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Comment whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Comment whereUserid($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Comment whereComment($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Comment whereUpdatedAt($value)
 */
class Comment extends Model {

    protected $table = "comment";

}
