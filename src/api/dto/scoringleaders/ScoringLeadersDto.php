<?php

namespace Fantasy\NFL\API\DTO\ScoringLeaders;

use Fantasy\NFL\API\DTO\MapsDto;

class ScoringLeadersDto extends MapsDto
{

    public $season;

    public $week;

    public $positions;

    static function dtomap($data)
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