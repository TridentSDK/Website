<?php

namespace TridentSDK\Enums;


abstract class Enum {

    static function getConstants(){
        return ((new \ReflectionClass(get_called_class()))->getConstants());
    }

    static function getKeys(){
        return array_keys((new \ReflectionClass(get_called_class()))->getConstants());
    }

    static function getValues(){
        return array_values((new \ReflectionClass(get_called_class()))->getConstants());
    }

    /**
     * @param array $data
     */
    static function constructObject($data){
        $className = get_called_class();
        $enum = new $className;

        foreach($data as $key => $value){
            if(property_exists($enum, $key)){
                $enum->{$key} = $value;
            }
        }

        return $enum;
    }

}