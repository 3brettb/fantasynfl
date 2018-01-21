<?php

namespace Fantasy\NFL\Fantasy\DTO\Standings;

use Fantasy\NFL\Resources\MapsDto;

class RecordDto extends MapsDto
{

    public $type;

    public $wins;

    public $losses;

    public $ties;

    static function dtomap($data)
    {
        try {
            return self::jsonmap($data);
        } catch(\ErrorException $e) {
            return null;
        }
    }

    static function jsonmap($data)
    {
        $obj = new RecordDto();
        $obj->type = $data->type;
        $obj->wins = $data->wins;
        $obj->losses = $data->losses;
        $obj->ties = $data->ties;
        return $obj;
    }

}