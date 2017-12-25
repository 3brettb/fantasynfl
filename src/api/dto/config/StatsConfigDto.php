<?php

namespace Fantasy\NFL\API\DTO\Config;

use Fantasy\NFL\Resources\MapsDto;

class StatsConfigDto extends MapsDto
{

    public $stats;

    static function dtomap($data)
    {
        $obj = new StatsConfigDto();
        $obj->stats = parent::mapArray($data->stats, Stat::class);
        return $obj;
    }

}