<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;

/**
 * TridentSDK\Session
 *
 * @property integer $userid
 * @property string $session
 * @property integer $timeout
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Session whereUserid($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Session whereSession($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Session whereTimeout($value)
 * @mixin \Eloquent
 */
class Session extends Model {

    protected $table = "session";

}
