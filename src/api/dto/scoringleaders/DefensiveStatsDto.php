<?php

namespace Fantasy\NFL\API\DTO\ScoringLeaders;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class DefensiveStatsDto extends ObjectMapsDto
{

    public $Tack;

    public $Ast;

    public $Sack;

    public $Int;

    public $IntTD;

    public $FumTD;

    public $BlkTD;

    public $FrcFum;

    public $FumRec;

    static function mapObject($data)
    {
        $obj = new DefensiveStatsDto();
        $obj->Tack = $data->Tack;
        $obj->Ast = $data->Ast;
        $obj->Sack = $data->Sack;
        $obj->Int = $data->Int;
        $obj->IntTD = $data->IntTD;
        $obj->FumTD = $data->FumTD;
        $obj->BlkTD = $data->BlkTD;
        $obj->FrcFum = $data->FrcFum;
        $obj->FumRec = $data->FumRec;
        return $obj;
    }

}