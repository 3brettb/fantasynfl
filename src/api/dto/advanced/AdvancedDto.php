<?php

namespace Fantasy\NFL\API\DTO\Advanced;

use Fantasy\NFL\Resources\MapsDto;

class AdvancedDto extends MapsDto
{

    public $position;

    public $players;

    static function dtomap($data)
    {
        $key = self::getKey($data);

        $obj = new AdvancedDto();
        $obj->position = $key;
        $obj->players = parent::mapArray($data->{$key}, PlayerDto::class);
        return $obj;
    }

    private static function getKey($data)
    {
        foreach($data as $key => $value)
        {
            return $key;
        }
    }

}