<?php

namespace Fantasy\NFL\API\DTO\Config;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class StatsConfigDto extends ObjectMapsDto
{

    public $stats;

    static function mapObject($data)
    {
        $obj = new StatsConfigDto();
        $obj->stats = parent::mapArray($data->stats, Stat::class);
        return $obj;
    }

}