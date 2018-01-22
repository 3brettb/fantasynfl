<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class StarterSettingsDto extends ObjectMapsDto
{

    public $name;

    public $positions;

    public $amount;

    static function mapObject($data)
    {
        $obj = new StarterSettingsDto();
        $obj->name = $data->name;
        $obj->positions = $data->positions;
        $obj->amount = $data->amount;
        return $obj;
    }

}