<?php

namespace Fantasy\NFL\API\DTO\Config;

use Fantasy\NFL\API\DTO\MapsDto;

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