<?php

namespace Fantasy\NFL\Fantasy\DTO\Week;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class StatDto extends ObjectMapsDto
{

    public $id;

    public $value;

    public $ptsPer;

    public $points;

    static function mapObject($data)
    {
        $obj = new StatDto();
        $obj->id = $data->id;
        $obj->value = $data->value;
        $obj->ptsPer = $data->ptsPer;
        $obj->points = $data->points;
        return $obj;
    }
}