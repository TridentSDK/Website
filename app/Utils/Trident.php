<?php

namespace TridentSDK\Utils;

class Trident {

    static $versions = array(
        "0.0.5" => ["1.12.1", "1.12.1"]
    );

    /**
     * @return array
     */
    static function versionsAsDropdown(){
        $versions = array();
        foreach (Trident::$versions as $version => $mc) {
            $versions[$version] = "Trident v".$version." (MC ".$mc[0]." - ".$mc[1].")";
        }
        return $versions;
    }

}