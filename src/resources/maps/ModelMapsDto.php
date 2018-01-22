<?php

namespace Fantasy\NFL\Resources\Maps;

abstract class ModelMapsDto extends MapsDto
{

    static function map($data)
    {
        try{
            return static::mapModel($data);
        } catch(\ErrorException $e) {
            return null;
        }
    }

    abstract static function mapModel($data);

}