<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\API\DTO\MapsDto;

class RosterPositionDto extends MapsDto
{

    public $position;

    public $minimum;

    public $maximum;

    static function dtomap($data)
    {
        $obj = new RosterPositionDto();
        $obj->position = $data->position;
        $obj->minimum = $data->minimum;
        $obj->maximum = $data->maximum;
        return $obj;
    }

}