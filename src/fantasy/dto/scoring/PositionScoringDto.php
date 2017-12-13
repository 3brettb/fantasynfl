<?php

namespace Fantasy\NFL\Fantasy\DTO\Scoring;

use Fantasy\NFL\API\DTO\MapsDto;

class PositionScoringDto extends MapsDto
{

    public $position;

    public $stats;

    static function dtomap($data)
    {
        $obj = new PositionScoringDto();
        $obj->position = $data->dto_vars['position'];
        $obj->stats = parent::mapArray($data->stats, StatDto::class);
        return $obj;
    }

}