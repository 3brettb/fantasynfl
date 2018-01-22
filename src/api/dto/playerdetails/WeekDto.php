<?php

namespace Fantasy\NFL\API\DTO\PlayerDetails;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class WeekDto extends ObjectMapsDto
{

    public $id;

    public $opponent;

    public $gameResult;

    public $gameDate;

    public $stats;

    public static function mapObject($data)
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