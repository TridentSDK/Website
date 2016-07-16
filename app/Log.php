<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;

/**
 * TridentSDK\Log
 *
 * @property integer $id
 * @property string $type
 * @property integer $user
 * @property string $data
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Log whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Log whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Log whereUser($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Log whereData($value)
 * @mixin \Eloquent
 */
class Log extends Model {

    protected $table = "log";

}
