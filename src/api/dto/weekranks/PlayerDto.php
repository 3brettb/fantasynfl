<?php

namespace Fantasy\NFL\API\DTO\WeekRanks;

use Fantasy\NFL\Resources\MapsDto;

class PlayerDto extends MapsDto
{

    public $id;

    public $esbid;

    public $gsisPlayerId;

    public $firstName;

    public $lastName;

    public $teamAbbr;

    public $opponentTeamAbbr;

    public $position;

    public $rank;

    public $auction;

    public $stock;

    static function dtomap($data)
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
        $obj->rank = $data->rank;
        $obj->auction = $data->auction;
        $obj->stock = $data->stock;
        return $obj;
    }
}