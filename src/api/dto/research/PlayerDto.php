<?php

namespace Fantasy\NFL\API\DTO\Research;

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

    public $percentOwned;

    public $percentOwnedChange;

    public $percentStarted;

    public $percentStartedChange;

    public $depthChartOrder;

    public $numAdds;

    public $numDrops;

    public static function dtomap($data)
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
        $obj->percentOwned = $data->percentOwned;
        $obj->percentOwnedChange = $data->percentOwnedChange;
        $obj->percentStarted =  $data->percentStarted;
        $obj->percentStartedChange = $data->percentStartedChange;
        $obj->depthChartOrder = $data->depthChartOrder;
        $obj->numAdds = $data->numAdds;
        $obj->numDrops = $data->numDrops;
        return $obj;
    }

}