<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Log
 *
 * @property integer $id
 * @property string $type
 * @property integer $user
 * @property string $data
 * @method static \Illuminate\Database\Query\Builder|\App\Log whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Log whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Log whereUser($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Log whereData($value)
 * @mixin \Eloquent
 */
class Log extends Model {

    protected $table = "log";

}
