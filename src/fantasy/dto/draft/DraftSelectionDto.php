<?php

namespace Fantasy\NFL\Fantasy\DTO\Draft;

use Fantasy\NFL\API\DTO\MapsDto;

class DraftSelectionDto extends MapsDto
{

    public $teamId;

    public $playerId;

    public $overall;

    public $round;

    public $number;

    static function dtomap($data)
    {
        $obj = new DraftSelectionDto();
        $obj->teamId = $data->teamId;
        $obj->playerId = $data->playerId;
        $obj->overall = $data->overall;
        $obj->round = $data->round;
        $obj->number = $data->number;
        return $obj;
    }

}