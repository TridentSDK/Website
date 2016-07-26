<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * TridentSDK\Comment
 *
 * @property integer $id
 * @property string $type
 * @property integer $typeid
 * @property integer $userid
 * @property string $comment
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Comment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Comment whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Comment whereTypeid($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Comment whereUserid($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Comment whereComment($value)
 * @mixin \Eloquent
 */
class Comment extends Model {

    use SoftDeletes;

    protected $table = "comment";

}
