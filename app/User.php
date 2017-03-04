<?php

namespace TridentSDK;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\RoutesNotifications;
use TridentSDK\Enums\UserRank;
use Illuminate\Database\Eloquent\SoftDeletes;

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
 * @property boolean $developer
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereDeletedAt($value)
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
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\User whereDeveloper($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 */
class User extends Authenticatable {

    use SoftDeletes, CanResetPassword, Notifiable;

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
        return ForumPost::getModel()->existsTopic()->where("forum_post.userid", "=", $this->id)->orderBy("forum_post.created_at", "DESC")->limit($count)->get();
    }

    /**
     * @return UserRank
     */
    public function rank(){
        return UserRank::getRank($this->rank);
    }

    public function updateLastOnline(){
        $this->last_online = time();
        $this->save();
    }

    public function isOnline(){
        return time() - $this->last_online < 300;
    }

    public function sendNotification($message){
        $notification = new Notification();
        $notification->user_id = $this->id;
        $notification->text = $message;
        $notification->save();
    }

    public function getLatestNotifications($count = 5){
        return Notification::whereUserId($this->id)->limit($count)->get();
    }

    public function getUnreadNotificationCount(){
        return Notification::whereUserId($this->id)->whereRead(false)->count();
    }

    public function readLatestNotifications($count = 5){
        Notification::whereUserId($this->id)->limit($count)->update(["read" => true]);
    }

	/**
	 * @param $user User
	 *
	 * @return bool
	 */
    public function canEdit($user){
    	if($user->id == $this->id){
    		return true;
	    }

	    if($user->rank()->isAdmin()){
    		return true;
	    }

	    return false;
    }

}
