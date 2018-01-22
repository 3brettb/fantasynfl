<?php

namespace Fantasy\NFL\Resources\Maps;

abstract class MapsDto
{

    use UsesMapMethods;

    public function __get($name){
        if(isset($this->$name) === true){
            return $this->$name;
        } else {
            return null;
        }
    }

    abstract static function map($data);

}