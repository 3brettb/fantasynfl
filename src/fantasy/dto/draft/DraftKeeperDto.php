<?php

namespace Fantasy\NFL\Fantasy\DTO\Draft;

use Fantasy\NFL\Resources\MapsDto;

class DraftKeeperDto extends MapsDto
{

    public $teamId;

    public $playerId;

    static function dtomap($data)
    {
        $obj = new DraftKeeperDto();
        $obj->teamId = $data->teamId;
        $obj->playerId = $data->playerId;
        return $obj;
    }

}