<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\API\DTO\MapsDto;

class DivisionSettingsDto extends MapsDto
{

    public $name;

    public $teams;

    static function dtomap($data)
    {
        $obj = new DivisionSettingsDto();
        $obj->name = $data->name;
        $obj->teams = $data->teams;
        return $obj;
    }

}