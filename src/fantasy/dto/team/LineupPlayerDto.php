<?php

namespace Fantasy\NFL\Fantasy\DTO\Team;

use Fantasy\NFL\API\DTO\MapsDto;

class LineupPlayerDto extends MapsDto
{

    public $projected;

    public $score;

    public $type;

    public $place;

    static function dtomap($data)
    {
        $obj = new LineupPlayerDto();
        $obj->projected = $data->projected;
        $obj->score = $data->score;
        $obj->type = $data->type;
        $obj->place = $data->place;
        return $obj;
    }

}