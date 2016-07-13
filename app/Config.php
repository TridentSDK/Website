<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Config
 *
 * @property integer $id
 * @property string $key
 * @property string $value
 * @method static \Illuminate\Database\Query\Builder|\App\Config whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Config whereKey($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Config whereValue($value)
 * @mixin \Eloquent
 */
class Config extends Model {

    protected $table = "config";

}
