<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * TridentSDK\Notification
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $text
 * @property boolean $read
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Notification whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Notification whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Notification whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Notification whereRead($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Notification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Notification whereDeletedAt($value)
 * @mixin \Eloquent
 */
class Notification extends Model {

    use SoftDeletes;

    protected $table = "notification";

}
