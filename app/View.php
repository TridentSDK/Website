<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * TridentSDK\View
 *
 * @property integer $user_id
 * @property integer $topic_id
 * @property integer $date
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\View whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\View whereTopicId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\View whereDate($value)
 * @mixin \Eloquent
 */
class View extends Model {

    protected $table = "view";

    public $timestamps = false;

}
