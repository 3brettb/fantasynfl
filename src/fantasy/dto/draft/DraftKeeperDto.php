<?php

namespace Fantasy\NFL\Fantasy\DTO\Draft;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class DraftKeeperDto extends ObjectMapsDto
{

    public $teamId;

    public $playerId;

    static function mapObject($data)
    {
        $obj = new DraftKeeperDto();
        $obj->teamId = $data->teamId;
        $obj->playerId = $data->playerId;
        return $obj;
    }

}