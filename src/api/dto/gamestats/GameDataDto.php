<?php

namespace Fantasy\NFL\API\DTO\GameStats;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class GameDataDto extends ObjectMapsDto
{

    public $id;

    public $away;

    public $home;

    public $status;

    public $minRemaining;

    public $minTotal;

    static function mapObject($data)
    {
        $obj = new GameDataDto();
        $obj->id = $data->id;
        $obj->away = $data->away;
        $obj->home = $data->home;
        $obj->status = $data->status;
        $obj->minRemaining = $data->minRemaining;
        $obj->minTotal = $data->minTotal;
        return $obj;
    }

}