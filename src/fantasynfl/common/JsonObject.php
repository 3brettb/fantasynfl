<?php

namespace Fantasy\NFL\FantasyNFL\Common;

class JsonObject
{

    private $json;

    public function __construct($json_string)
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