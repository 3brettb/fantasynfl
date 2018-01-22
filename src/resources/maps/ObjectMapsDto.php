<?php

namespace Fantasy\NFL\Resources\Maps;

abstract class ObjectMapsDto extends MapsDto
{

    static function map($data)
    {
        try{
            return static::mapObject($data);
        } catch(\ErrorException $e) {
            return null;
        }
    }

    abstract static function mapObject($data);

}