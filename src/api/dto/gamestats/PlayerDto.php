<?php

namespace Fantasy\NFL\API\DTO\GameStats;

use Fantasy\NFL\API\DTO\MapsDto;
use Fantasy\NFL\API\DTO\PlayerDetails\StatDto;

class PlayerDto extends MapsDto
{

    public $id;

    public $stats;

    static function dtomap($data)
    {
        $obj = new PlayerDto();
        $obj->id = $data->id;
        unset($data->id);
        $obj->stats = parent::mapKeyValue($data, StatDto::class);
        return $obj;
    }

}