<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class RosterPositionDto extends ObjectMapsDto
{

    public $position;

    public $minimum;

    public $maximum;

    static function mapObject($data)
    {
        $obj = new RosterPositionDto();
        $obj->position = $data->position;
        $obj->minimum = $data->minimum;
        $obj->maximum = $data->maximum;
        return $obj;
    }

}