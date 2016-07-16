<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;

/**
 * TridentSDK\Denial
 *
 * @property integer $id
 * @property string $type
 * @property integer $typeid
 * @property string $reason
 * @property integer $user
 * @property integer $date
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Denial whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Denial whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Denial whereTypeid($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Denial whereReason($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Denial whereUser($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Denial whereDate($value)
 * @mixin \Eloquent
 */
class Denial extends Model {

    protected $table = "denial";

}
