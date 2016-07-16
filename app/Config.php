<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;

/**
 * TridentSDK\Config
 *
 * @property integer $id
 * @property string $key
 * @property string $value
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Config whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Config whereKey($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Config whereValue($value)
 * @mixin \Eloquent
 */
class Config extends Model {

    protected $table = "config";

}
