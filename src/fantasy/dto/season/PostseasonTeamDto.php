<?php

namespace Fantasy\NFL\Fantasy\DTO\Season;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class PostseasonTeamDto extends ObjectMapsDto
{

    public $id;

    public $name;

    public $owner;

    public $seed;

    static function mapObject($data)
    {
        $obj = new PostseasonTeamDto();
        $obj->id = $data->id;
        $obj->name = $data->name;
        $obj->owner = $data->owner;
        $obj->seed = $data->seed;
        return $obj;
    }

}