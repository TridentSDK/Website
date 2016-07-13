<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ResendValidation
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $time
 * @method static \Illuminate\Database\Query\Builder|\App\ResendValidation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ResendValidation whereUserid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ResendValidation whereTime($value)
 * @mixin \Eloquent
 */
class ResendValidation extends Model {

    protected $table = "resend_validation";

}
