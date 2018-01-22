<?php

namespace Fantasy\NFL\API\DTO\Advanced;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class AdvancedDto extends ObjectMapsDto
{

    public $position;

    public $players;

    static function mapObject($data)
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