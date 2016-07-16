<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;

/**
 * TridentSDK\ResendValidation
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $time
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ResendValidation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ResendValidation whereUserid($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ResendValidation whereTime($value)
 * @mixin \Eloquent
 */
class ResendValidation extends Model {

    protected $table = "resend_validation";

}
