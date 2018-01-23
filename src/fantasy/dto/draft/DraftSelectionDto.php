<?php

namespace Fantasy\NFL\Fantasy\DTO\Draft;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class DraftSelectionDto extends ObjectMapsDto
{

    public $ownerId;

    public $teamId;

    public $playerId;

    public $overall;

    public $round;

    public $number;

    static function mapObject($data)
    {
        $obj = new DraftSelectionDto();
        $obj->ownerId = $data->ownerId;
        $obj->teamId = $data->teamId;
        $obj->playerId = $data->playerId;
        $obj->overall = $data->overall;
        $obj->round = $data->round;
        $obj->number = $data->number;
        return $obj;
    }

}