<?php

namespace Fantasy\NFL\Fantasy\DTO\League;

use Fantasy\NFL\Resources\MapsDto;

class PlayersDto extends MapsDto
{

    static function dtomap($data)
    {
        return self::mapArray($data, PlayerDto::class);
    }

}