<?php

namespace Fantasy\NFL\API\DTO\PlayerDetails;

use Fantasy\NFL\Resources\MapsDto;

class PlayersDto extends MapsDto
{

    public $players;

    public static function dtomap($data)
    {
        $obj = new PlayersDto();
        $obj->players = parent::mapArray($data->players, PlayerDto::class);
        return $obj;
    }

}