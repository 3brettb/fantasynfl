<?php

namespace Fantasy\NFL\Resources\Maps;

abstract class ClassMapsDto extends MapsDto
{

    static function map($data)
    {
        try{
            return static::mapClass($data);
        } catch(\ErrorException $e) {
            return null;
        }
    }

    abstract static function mapClass($class);

}