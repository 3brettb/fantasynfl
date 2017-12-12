<?php

namespace Fantasy\NFL\API\DTO\Config;

use Fantasy\NFL\API\DTO\MapsDto;

class Stat extends MapsDto
{

    public $id;

    public $abbr;

    public $name;

    public $shortName;

    static function dtomap($data)
    {
        $obj = new Stat();
        $obj->id = $data->id;
        $obj->abbr = $data->abbr;
        $obj->name = $data->name;
        $obj->shortName = $data->shortName;
        return $obj;
    }

}