<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;

/**
 * TridentSDK\ForumTopic
 *
 * @property integer $id
 * @property string $name
 * @property integer $user
 * @property integer $date
 * @property integer $category
 * @property integer $lastupdate
 * @property integer $lastuser
 * @property boolean $sticky
 * @property boolean $deleted
 * @property integer $locked
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereUser($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereCategory($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereLastupdate($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereLastuser($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereSticky($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereDeleted($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereLocked($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumTopic whereUpdatedAt($value)
 */
class ForumTopic extends Model {

    protected $table = "forum_topic";

}
