<?php

namespace Fantasy\NFL\Resources\Maps;

abstract class JsonMapsDto extends MapsDto
{

    static function map($data)
    {
        try{
            return static::mapJson(json_decode($data));
        } catch(\ErrorException $e) {
            return null;
        }
    }

    abstract static function mapJson($data);

}