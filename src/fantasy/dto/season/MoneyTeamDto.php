<?php

namespace Fantasy\NFL\Fantasy\DTO\Season;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class MoneyTeamDto extends ObjectMapsDto
{

    public $id;

    public $name;

    public $owner;

    public $paid;

    public $earned;

    public $notes;

    static function mapObject($data)
    {
        $obj = new MoneyTeamDto();
        $obj->id = $data->id;
        $obj->name = $data->name;
        $obj->owner = $data->owner;
        $obj->paid = $data->paid;
        $obj->earned = $data->earned;
        $obj->notes = $data->notes;
        return $obj;
    }

}