<?php

namespace Fantasy\NFL\API\DTO\ScoringLeaders;

use Fantasy\NFL\API\DTO\MapsDto;

class PositionsDto extends MapsDto
{

    public $QB;

    public $RB;

    public $WR;

    public $TE;

    public $K;

    public $DEF;

    public $DB;

    public $LB;

    public $DL;

    static function dtomap($data)
    {
        $obj = new PositionsDto();
        $obj->QB = parent::mapArray($data->QB, PlayerDto::class);
        $obj->RB = parent::mapArray($data->RB, PlayerDto::class);
        $obj->WR = parent::mapArray($data->WR, PlayerDto::class);
        $obj->TE = parent::mapArray($data->TE, PlayerDto::class);
        $obj->K = parent::mapArray($data->K, PlayerDto::class);
        $obj->DEF = parent::mapArray($data->DEF, PlayerDto::class);
        $obj->DB = parent::mapArray($data->DB, PlayerDto::class);
        $obj->LB = parent::mapArray($data->LB, PlayerDto::class);
        $obj->DL = parent::mapArray($data->DL, PlayerDto::class);
        return $obj;
    }

}