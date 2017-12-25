<?php

namespace Fantasy\NFL\Fantasy\DTO\Week;

use Fantasy\NFL\Resources\MapsDto;

class GameStatsDto extends MapsDto
{

    public $id;

    public $type;

    public $place;

    public $projected;

    public $points;

    public $stats;

    static function dtomap($data)
    {
        $obj = new GameStatsDto();
        $obj->id = $data->id;
        $obj->type = $data->type;
        $obj->place = $data->place;
        $obj->projected = $data->projected;
        $obj->points = $data->points;
        $obj->stats = self::mapArray($data->stats, StatDto::class);
        return $obj;
    }
}