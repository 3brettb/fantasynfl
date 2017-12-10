<?php

namespace Fantasy\NFL\API\DTO\PlayerDetails;

use Fantasy\NFL\API\DTO\MapsDto;

class WeekDto extends MapsDto
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
        $obj->stats = parent::mapKeyValue($data->stats, StatDto::class);
        return $obj;
    }

}