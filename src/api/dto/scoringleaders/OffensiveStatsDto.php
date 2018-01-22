<?php

namespace Fantasy\NFL\API\DTO\ScoringLeaders;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class OffensiveStatsDto extends ObjectMapsDto
{

    public $PassYds;

    public $PassTDs;

    public $Int;

    public $RushYds;

    public $RushTDs;

    public $RecYds;

    public $RecTDs;

    public $FumTD;

    public $TwoPt;

    public $FumLost;

    static function mapObject($data)
    {
        $obj = new OffensiveStatsDto();
        $obj->PassYds = $data->PassYds;
        $obj->PassTDs = $data->PassTDs;
        $obj->Int = $data->Int;
        $obj->RushYds = $data->RushYds;
        $obj->RushTDs = $data->RushTDs;
        $obj->RecYds = $data->RecYds;
        $obj->RecTDs = $data->RecTDs;
        $obj->FumTD = $data->FumTD;
        $obj->TwoPt = $data->TwoPt;
        $obj->FumLost = $data->FumLost;
        return $obj;
    }

}