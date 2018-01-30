<?php

namespace Fantasy\NFL\FantasyNFL\Common;

class JsonObject
{

    private $json;

    private function __construct($json_string)
    {
        if(!is_object($json_string) && is_string($json_string)) {
            try {
                $this->json = json_decode($json_string);
            } catch (\Exception $e) {
                $this->json = json_decode("{}");
            }
        } else {
            $this->json = json_decode("{}");
        }
    }

    public static function asJson($string)
    {
        $obj = new JsonObject($string);
        return (self::isNullObject($obj)) ? null : $obj;
    }

    public static function asDecoded($decoded)
    {
        $obj = new JsonObject("{}");
        $obj->json = $decoded;
        return (self::isNullObject($obj)) ? null : $obj;
    }

    public static function asDecodedArray($decodedArray)
    {
        $out = collect();
        foreach($decodedArray as $item)
        {
            $out->push(self::asDecoded($item));
        }
        return $out;
    }

    private static function isNullObject($obj)
    {
        // Override this for now, maybe we want a blank object
        return false;
        //return ($obj->json == json_decode("{}"));
    }

    public function __get($name)
    {
        if($this->__isset($name))
        {
            return $this->json->$name;
        }
        return null;
    }

    public function __isset($name)
    {
        return isset($this->json->$name);
    }

}