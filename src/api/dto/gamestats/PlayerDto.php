<?php

namespace Fantasy\NFL\API\DTO\GameStats;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;
use Fantasy\NFL\API\DTO\PlayerDetails\StatDto;

class PlayerDto extends ObjectMapsDto
{

    public $id;

    public $stats;

    static function mapObject($data)
    {
        $obj = new PlayerDto();
        $obj->id = $data->id;
        unset($data->id);
        $obj->stats = parent::mapKeyValue($data, StatDto::class);
        return $obj;
    }

}