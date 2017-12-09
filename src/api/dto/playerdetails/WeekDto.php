<?php

namespace Fantasy\NFL\API\DTO\PlayerDetails;

use Fantasy\NFL\API\DTO\MapsDto;

class WeekDto implements MapsDto
{

    public $id;

    public $opponent;

    public $gameResult;

    public $gameDate;

    public $stats;

    public static function dtomap($data)
    {
        $obj = new WeekDto();
        $obj->id = $data->id;
        $obj->opponent = $data->opponent;
        $obj->gameResult = $data->gameResult;
        $obj->gameDate = $data->gameDate;
        $obj->stats = self::mapStats($data->stats);
        return $obj;
    }

    private static function mapStats($data)
    {
        $out = array();
        foreach($data as $key => $value)
        {
            array_push($out, new StatDto($key, $value));
        }
        return $out;
    }

}