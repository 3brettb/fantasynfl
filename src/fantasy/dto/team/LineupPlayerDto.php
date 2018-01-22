<?php

namespace Fantasy\NFL\Fantasy\DTO\Team;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class LineupPlayerDto extends ObjectMapsDto
{

    public $projected;

    public $score;

    public $type;

    public $place;

    static function mapObject($data)
    {
        $obj = new LineupPlayerDto();
        $obj->projected = $data->projected;
        $obj->score = $data->score;
        $obj->type = $data->type;
        $obj->place = $data->place;
        return $obj;
    }

}