<?php

namespace TridentSDK\Enums;

class UserRank extends Enum {

    const MEMBER = array("rank" => 0, "name" => "Member");
    const DEVELOPER = array("rank" => 2, "name" => "Developer");
    const MODERATOR = array("rank" => 5, "name" => "Moderator");
    const ADMIN = array("rank" => 10, "name" => "Admin");

    private static $REVERSE = null;

    /**
     * @var integer $rank Rank ID
     */
    protected $rank;

    /**
     * @var string $name Readable Name
     */
    protected $name;

    /**
     * @return bool
     */
    public function isDeveloper(){
        return $this->rank >= UserRank::DEVELOPER["rank"];
    }

    /**
     * @return bool
     */
    public function isModerator(){
        return $this->rank >= UserRank::MODERATOR["rank"];
    }

    /**
     * @return bool
     */
    public function isAdmin(){
        return $this->rank >= UserRank::ADMIN["rank"];
    }

    /**
     * @return string
     */
    public function getName(){
        return $this->name;
    }

    /**
     * @param integer $id
     * @return UserRank
     * @throws \Exception
     */
    static function getRank($id){
        if(UserRank::$REVERSE == null){
            $r = new \ReflectionClass(get_called_class());
            UserRank::$REVERSE = array();
            foreach($r->getConstants() as $key => $value){
                UserRank::$REVERSE[$value["rank"]] = $r->getConstant($key);
            }
        }

        if(!array_key_exists($id, UserRank::$REVERSE)){
            throw new \Exception("Rank with ID ".$id." not found!");
        }

        return self::constructObject(UserRank::$REVERSE[$id]);
    }

}