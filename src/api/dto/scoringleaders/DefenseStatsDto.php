<?php

namespace Fantasy\NFL\API\DTO\ScoringLeaders;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class DefenseStatsDto extends ObjectMapsDto
{

    public $Sack;

    public $Int;

    public $FumRec;

    public $Saf;

    public $TD;

    public $RetTD;

    public $PtsAllowed;

    static function mapObject($data)
    {
        $obj = new DefenseStatsDto();
        $obj->Sack = $data->Sack;
        $obj->Int = $data->Int;
        $obj->FumRec = $data->FumRec;
        $obj->Saf = $data->Saf;
        $obj->TD = $data->TD;
        $obj->RetTD = $data->RetTD;
        $obj->PtsAllowed = $data->PtsAllowed;
        return $obj;
    }

}