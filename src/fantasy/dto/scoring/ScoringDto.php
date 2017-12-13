<?php

namespace Fantasy\NFL\Fantasy\DTO\Scoring;

use Fantasy\NFL\API\DTO\MapsDto;
use Fantasy\NFL\Enums\PositionStrings;

class ScoringDto extends MapsDto
{

    public $leagueId;

    public $seasonId;

    public $QB;

    public $RB;

    public $WR;

    public $TE;

    public $K;

    public $DEF;

    public $DB;

    public $DL;

    public $LB;

    static function dtomap($data)
    {
        $obj = new ScoringDto();
        $obj->leagueId = $data->leagueId;
        $obj->seasonId = $data->seasonId;
        $obj->QB = parent::mapWithVars($data->QB, ['position' => PositionStrings::QB], PositionScoringDto::class);
        $obj->RB = parent::mapWithVars($data->RB, ['position' => PositionStrings::RB], PositionScoringDto::class);
        $obj->WR = parent::mapWithVars($data->WR, ['position' => PositionStrings::WR], PositionScoringDto::class);
        $obj->TE = parent::mapWithVars($data->TE, ['position' => PositionStrings::TE], PositionScoringDto::class);
        $obj->K = parent::mapWithVars($data->K, ['position' => PositionStrings::K], PositionScoringDto::class);
        $obj->DEF = parent::mapWithVars($data->DEF, ['position' => PositionStrings::DEF], PositionScoringDto::class);
        $obj->DB = parent::mapWithVars($data->DB, ['position' => PositionStrings::DB], PositionScoringDto::class);
        $obj->DL = parent::mapWithVars($data->DL, ['position' => PositionStrings::DL], PositionScoringDto::class);
        $obj->LB = parent::mapWithVars($data->LB, ['position' => PositionStrings::LB], PositionScoringDto::class);
        return $obj;
    }

}