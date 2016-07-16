<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;

/**
 * TridentSDK\Message
 *
 * @property integer $id
 * @property integer $parent
 * @property integer $sender
 * @property integer $recipient
 * @property string $message
 * @property integer $date
 * @property integer $lastedit
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Message whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Message whereParent($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Message whereSender($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Message whereRecipient($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Message whereMessage($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Message whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Message whereLastedit($value)
 * @mixin \Eloquent
 */
class Message extends Model {

    protected $table = "message";

}
