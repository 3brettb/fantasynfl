<?php

namespace Fantasy\NFL\API\DTO\Advanced;

use Fantasy\NFL\Resources\MapsDto;

class StatsDto extends MapsDto
{

    public $fanPtsAgainstOpponentPts;

    public $fanPtsAgainstOpponentRank;

    public $carries;

    public $touches;

    public $receptions;

    public $targets;

    public $receptionPercentage;

    public $redzoneTargets;

    public $redzoneTouches;

    public $redzoneG2g;

    static function dtomap($data)
    {
        $obj = new StatsDto();
        $obj->fanPtsAgainstOpponentPts = $data->FanPtsAgainstOpponentPts;
        $obj->fanPtsAgainstOpponentRank = $data->FanPtsAgainstOpponentRank;
        $obj->carries = $data->Carries;
        $obj->touches = $data->Touches;
        $obj->receptions = $data->Receptions;
        $obj->targets = $data->Targets;
        $obj->receptionPercentage = $data->ReceptionPercentage;
        $obj->redzoneTargets = $data->RedzoneTargets;
        $obj->redzoneTouches = $data->RedzoneTouches;
        $obj->redzoneG2g = $data->RedzoneG2g;
        return $obj;
    }

}