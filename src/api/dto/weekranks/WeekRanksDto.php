<?php

namespace Fantasy\NFL\API\DTO\WeekRanks;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class WeekRanksDto extends ObjectMapsDto
{

    public $lastUpdated;

    public $players;

    static function mapObject($data)
    {
        $obj = new WeekRanksDto();
        $obj->lastUpdated = $data->lastUpdated;
        $obj->players = parent::mapArray($data->players, PlayerDto::class);
        return $obj;
    }
}