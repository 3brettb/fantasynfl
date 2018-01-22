<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class StatDto extends ObjectMapsDto
{

    public $id;

    public $pts;

    static function mapObject($data)
    {
        $obj = new StatDto();
        $obj->id = $data->id;
        $obj->pts = $data->pts;
        return $obj;
    }

}