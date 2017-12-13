<?php

namespace Fantasy\NFL\Fantasy\DTO\Scoring;

use Fantasy\NFL\API\DTO\MapsDto;

class StatDto extends MapsDto
{

    public $id;

    public $pts;

    static function dtomap($data)
    {
        $obj = new StatDto();
        $obj->id = $data->id;
        $obj->pts = $data->pts;
        return $obj;
    }

}