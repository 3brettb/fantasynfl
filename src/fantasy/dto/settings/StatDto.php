<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\Resources\MapsDto;

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