<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\Resources\MapsDto;

class StarterSettingsDto extends MapsDto
{

    public $name;

    public $positions;

    public $amount;

    static function dtomap($data)
    {
        $obj = new StarterSettingsDto();
        $obj->name = $data->name;
        $obj->positions = $data->positions;
        $obj->amount = $data->amount;
        return $obj;
    }

}