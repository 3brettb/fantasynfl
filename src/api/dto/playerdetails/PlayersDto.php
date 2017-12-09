<?php

namespace Fantasy\NFL\API\DTO\PlayerDetails;

use Fantasy\NFL\API\DTO\MapsDto;

class PlayersDto implements MapsDto
{

    public $players;

    public static function dtomap($data)
    {
        $obj = new PlayersDto();
        $obj->players = self::mapPlayers($data->players);
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