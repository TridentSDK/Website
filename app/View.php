<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * TridentSDK\View
 *
 * @property integer $user_id
 * @property integer $topic_id
 * @property integer $date
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\View whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\View whereTopicId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\View whereDate($value)
 * @mixin \Eloquent
 */
class View extends Model {

    protected $table = "view";

    public $timestamps = false;

    protected $primaryKey = ['user_id', 'topic_id', 'date'];
    public $incrementing = false;

    /**
     * Set the keys for a save update query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(\Illuminate\Database\Eloquent\Builder $query){
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null){
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }

}
