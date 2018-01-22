<?php

namespace Fantasy\NFL\API\DTO\Advanced;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class PlayerDto extends ObjectMapsDto
{

    public $id;

    public $esbid;

    public $gsisPlayerId;

    public $firstName;

    public $lastName;

    public $teamAbbr;

    public $opponentTeamAbbr;

    public $position;

    public $stats;

    public $status;

    static function mapObject($data)
    {
        $obj = new PlayerDto();
        $obj->id = $data->id;
        $obj->esbid = $data->esbid;
        $obj->gsisPlayerId = $data->gsisPlayerId;
        $obj->firstName = $data->firstName;
        $obj->lastName = $data->lastName;
        $obj->teamAbbr = $data->teamAbbr;
        $obj->opponentTeamAbbr = $data->opponentTeamAbbr;
        $obj->position = $data->position;
        $obj->stats = StatsDto::map($data->stats);
        $obj->status = $data->status;
        return $obj;
    }

}