<?php

namespace Fantasy\NFL\Fantasy\DTO\Team;

use Fantasy\NFL\API\DTO\MapsDto;

class LineupDto extends MapsDto
{

    static function dtomap($data)
    {
        return self::mapArray($data->players, LineupPlayerDto::class);
    }

}