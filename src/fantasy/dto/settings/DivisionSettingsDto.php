<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class DivisionSettingsDto extends ObjectMapsDto
{

    public $name;

    public $teams;

    static function mapObject($data)
    {
        $obj = new DivisionSettingsDto();
        $obj->name = $data->name;
        $obj->teams = $data->teams;
        return $obj;
    }

}