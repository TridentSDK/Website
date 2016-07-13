<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ForumTopic
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
 * @method static \Illuminate\Database\Query\Builder|\App\ForumTopic whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumTopic whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumTopic whereUser($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumTopic whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumTopic whereCategory($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumTopic whereLastupdate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumTopic whereLastuser($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumTopic whereSticky($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumTopic whereDeleted($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ForumTopic whereLocked($value)
 * @mixin \Eloquent
 */
class ForumTopic extends Model {

    protected $table = "forum_topic";

}
