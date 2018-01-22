<?php

namespace Fantasy\NFL\API\DTO\Stats;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class StatsDto extends ObjectMapsDto
{

    public $statType;

    public $season;

    public $week;

    public $players;

    public static function mapObject($data)
    {
        $obj = new StatsDto();
        $obj->statType = $data->statType;
        $obj->season = $data->season;
        $obj->week = $data->week;
        $obj->players = parent::mapArray($data->players, PlayerDto::class);
        return $obj;
    }

}