<?php

namespace Fantasy\NFL\Fantasy\DTO\Season;

use Fantasy\NFL\API\DTO\MapsDto;

class PostseasonTeamDto extends MapsDto
{

    public $id;

    public $name;

    public $owner;

    public $seed;

    static function dtomap($data)
    {
        $obj = new PostseasonTeamDto();
        $obj->id = $data->id;
        $obj->name = $data->name;
        $obj->owner = $data->owner;
        $obj->seed = $data->seed;
        return $obj;
    }

}