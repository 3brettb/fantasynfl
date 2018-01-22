<?php

namespace Fantasy\NFL\API\DTO\Research;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class ResearchDto extends ObjectMapsDto
{

    public $lastUpdated;

    public $players;

    public static function mapObject($data)
    {
        $obj = new ResearchDto();
        $obj->lastUpdated = $data->lastUpdated;
        $obj->players = parent::mapArray($data->players, PlayerDto::class);
        return $obj;
    }

}