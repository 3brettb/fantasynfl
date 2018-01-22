<?php

namespace Fantasy\NFL\API\DTO\ScoringLeaders;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class ScoringLeadersDto extends ObjectMapsDto
{

    public $season;

    public $week;

    public $positions;

    static function mapObject($data)
    {
        $obj = new ScoringLeadersDto();
        $obj->season = $data->season;
        $obj->week = $data->week;
        $obj->positions = self::mapPositions($data->positions);
        return $obj;
    }

    private static function mapPositions($data)
    {
        $out = array();
        foreach($data as $key => $position)
        {
            $out[$key] = parent::mapArray($position, PlayerDto::class);
        }
        return $out;
    }

}