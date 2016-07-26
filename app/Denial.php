<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * TridentSDK\Denial
 *
 * @property integer $id
 * @property string $type
 * @property integer $typeid
 * @property string $reason
 * @property integer $user
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Denial whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Denial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Denial whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Denial whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Denial whereTypeid($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Denial whereReason($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Denial whereUser($value)
 * @mixin \Eloquent
 */
class Denial extends Model {

    use SoftDeletes;

    protected $table = "denial";

}
