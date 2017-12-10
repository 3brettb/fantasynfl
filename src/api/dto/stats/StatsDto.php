<?php

namespace Fantasy\NFL\API\DTO\Stats;

use Fantasy\NFL\API\DTO\MapsDto;

class StatsDto implements MapsDto
{

    public $statType;

    public $season;

    public $week;

    public $players;

    public static function dtomap($data)
    {
        $obj = new StatsDto();
        $obj->statType = $data->statType;
        $obj->season = $data->season;
        $obj->week = $data->week;
        $obj->players = static::mapPlayers($data->players);
        return $obj;
    }

    private static function mapPlayers($data)
    {
        $out = array();
        foreach($data as $item)
        {
            array_push($out, PlayerDto::dtomap($item));
        }
        return $out;
    }

}