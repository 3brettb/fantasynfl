<?php

namespace Fantasy\NFL\Fantasy\DTO\Week;

use Fantasy\NFL\Resources\MapsDto;

class StatDto extends MapsDto
{

    public $id;

    public $value;

    public $ptsPer;

    public $points;

    static function dtomap($data)
    {
        $obj = new StatDto();
        $obj->id = $data->id;
        $obj->value = $data->value;
        $obj->ptsPer = $data->ptsPer;
        $obj->points = $data->points;
        return $obj;
    }
}