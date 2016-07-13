<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Message
 *
 * @property integer $id
 * @property integer $parent
 * @property integer $sender
 * @property integer $recipient
 * @property string $message
 * @property integer $date
 * @property integer $lastedit
 * @method static \Illuminate\Database\Query\Builder|\App\Message whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Message whereParent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Message whereSender($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Message whereRecipient($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Message whereMessage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Message whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Message whereLastedit($value)
 * @mixin \Eloquent
 */
class Message extends Model {

    protected $table = "message";

}
