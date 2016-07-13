<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Session
 *
 * @property integer $userid
 * @property string $session
 * @property integer $timeout
 * @method static \Illuminate\Database\Query\Builder|\App\Session whereUserid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Session whereSession($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Session whereTimeout($value)
 * @mixin \Eloquent
 */
class Session extends Model {

    protected $table = "session";

}
