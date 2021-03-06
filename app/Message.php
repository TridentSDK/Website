<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * TridentSDK\Message
 *
 * @property integer $id
 * @property integer $parent
 * @property integer $sender
 * @property integer $recipient
 * @property string $message
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Message whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Message whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Message whereParent($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Message whereSender($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Message whereRecipient($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Message whereMessage($value)
 * @mixin \Eloquent
 */
class Message extends Model {

    use SoftDeletes;

    protected $table = "message";

}
