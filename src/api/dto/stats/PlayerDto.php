<?php

namespace Fantasy\NFL\API\DTO\Stats;

use Fantasy\NFL\API\DTO\MapsDto;
use Fantasy\NFL\API\DTO\PlayerDetails\StatDto;

class PlayerDto implements MapsDto
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
        $obj->stats = static::mapStats($data->stats);
        return $obj;
    }

    private static function mapStats($data)
    {
        $out = array();
        foreach($data as $key => $value)
        {
            array_push($out, new StatDto($key, $value));
        }
        return $out;
    }

}