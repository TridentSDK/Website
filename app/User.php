<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\User
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
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereSalt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereMcusername($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRank($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereAllowReview($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereLastOnline($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreationDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereFirstIp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereLastIp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereValidationCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereValidated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereSendEmails($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereToken($value)
 * @mixin \Eloquent
 */
class User extends Model {

    protected $table = "user";

    public function getAvatar($size = 0){
        if($this->avatar == "" || $this->avatar == "gravatar"){
            if($size > 0){
                return "https://www.gravatar.com/avatar/".md5(strtolower(trim($this->email)))."?s=".$size;
            }else{
                return "https://www.gravatar.com/avatar/".md5(strtolower(trim($this->email)));
            }
        }else{
            return $this->avatar;
        }

        return "";
    }

}
