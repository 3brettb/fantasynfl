<?php

namespace Fantasy\NFL\API\DTO\WeekRanks;

use Fantasy\NFL\API\DTO\MapsDto;

class WeekRanksDto extends MapsDto
{

    public $lastUpdated;

    public $players;

    static function dtomap($data)
    {
        $obj = new WeekRanksDto();
        $obj->lastUpdated = $data->lastUpdated;
        $obj->players = parent::mapArray($data->players, PlayerDto::class);
        return $obj;
    }
}