<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Denial
 *
 * @property integer $id
 * @property string $type
 * @property integer $typeid
 * @property string $reason
 * @property integer $user
 * @property integer $date
 * @method static \Illuminate\Database\Query\Builder|\App\Denial whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Denial whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Denial whereTypeid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Denial whereReason($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Denial whereUser($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Denial whereDate($value)
 * @mixin \Eloquent
 */
class Denial extends Model {

    protected $table = "denial";

}
