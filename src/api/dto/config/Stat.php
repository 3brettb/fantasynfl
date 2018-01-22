<?php

namespace Fantasy\NFL\API\DTO\Config;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class Stat extends ObjectMapsDto
{

    public $id;

    public $abbr;

    public $name;

    public $shortName;

    static function mapObject($data)
    {
        $obj = new Stat();
        $obj->id = $data->id;
        $obj->abbr = $data->abbr;
        $obj->name = $data->name;
        $obj->shortName = $data->shortName;
        return $obj;
    }

}