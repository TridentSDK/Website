<?php

namespace TridentSDK;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * TridentSDK\User
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $email
 * @property string $mcusername
 * @property integer $rank
 * @property string $avatar
 * @property boolean $allow_review
 * @property integer $last_online
 * @property integer $creation_date
 * @property string $first_ip
 * @property string $last_ip
 * @property string $validation_code
 * @property boolean $validated
 * @property boolean $send_emails
 * @property string $token
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property boolean $rehashed
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereSalt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereMcusername($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereRank($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereAvatar($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereAllowReview($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereLastOnline($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereCreationDate($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereFirstIp($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereLastIp($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereValidationCode($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereValidated($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereSendEmails($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereToken($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereRehashed($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable {

    protected $table = "user";

    protected $fillable = ['username', 'email', 'password', 'validation_code', 'token'];

    public function getAvatar($size = 0){
        if($this->avatar == "" || $this->avatar == "gravatar"){
            if($size > 0){
                return "https://www.gravatar.com/avatar/".md5(strtolower(trim($this->email)))."?s=".$size;
            }else{
                return "https://www.gravatar.com/avatar/".md5(strtolower(trim($this->email)));
            }
        }

        return $this->avatar;
    }

    public function topicCount(){
        return \Cache::remember('user_forum_topic_count'.$this->id, 0, function(){
            return ForumTopic::whereUser($this->id)->whereDeleted(false)->count();
        });
    }

    public function postCount(){
        return \Cache::remember('user_forum_post_count'.$this->id, 0, function(){
            return ForumPost::whereUserid($this->id)->whereDeleted(false)->count();
        });
    }

    public function recentTopics($count = 14){
        return ForumTopic::whereUser($this->id)->whereDeleted(false)->orderBy("created_at", "DESC")->limit($count)->get();
    }

    public function recentPosts($count = 14){
        return ForumPost::getModel()->innerTopic()->where("forum_post.userid", "=", $this->id)->orderBy("forum_post.created_at", "DESC")->limit($count)->get();
    }

}
