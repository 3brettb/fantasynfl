<?php

namespace Fantasy\NFL\API\DTO\Stats;

use Fantasy\NFL\Resources\MapsDto;
use Fantasy\NFL\API\DTO\PlayerDetails\StatDto;

class PlayerDto extends MapsDto
{

    public $id;

    public $esbid;

    public $gsisPlayerId;

    public $name;

    public $teamAbbr;

    public $stats;

    public static function dtomap($data)
    {
        $obj = new PlayerDto();
        $obj->id = $data->id;
        $obj->esbid = $data->esbid;
        $obj->gsisPlayerId = $data->gsisPlayerId;
        $obj->name = $data->name;
        $obj->teamAbbr = $data->teamAbbr;
        $obj->stats = static::mapKeyValue($data->stats, StatDto::class);
        return $obj;
    }

}