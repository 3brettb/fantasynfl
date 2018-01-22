<?php

namespace Fantasy\NFL\Fantasy\DTO\Team;

use Fantasy\NFL\Resources\Maps\MapsDto;

class LineupDto extends MapsDto
{

    static function map($data)
    {
        return self::mapArray($data->players, LineupPlayerDto::class);
    }

}