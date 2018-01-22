<?php

namespace Fantasy\NFL\Fantasy\DTO\League;

use Fantasy\NFL\Resources\Maps\MapsDto;

class PlayersDto extends MapsDto
{

    static function map($data)
    {
        return self::mapArray($data, PlayerDto::class);
    }

}