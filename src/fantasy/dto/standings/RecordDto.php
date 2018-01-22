<?php

namespace Fantasy\NFL\Fantasy\DTO\Standings;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class RecordDto extends ObjectMapsDto
{

    public $type;

    public $wins;

    public $losses;

    public $ties;

    static function mapObject($data)
    {
        $obj = new RecordDto();
        $obj->type = $data->type;
        $obj->wins = $data->wins;
        $obj->losses = $data->losses;
        $obj->ties = $data->ties;
        return $obj;
    }

}