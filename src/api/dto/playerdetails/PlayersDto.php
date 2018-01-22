<?php

namespace Fantasy\NFL\API\DTO\PlayerDetails;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class PlayersDto extends ObjectMapsDto
{

    public $players;

    public static function mapObject($data)
    {
        $obj = new PlayersDto();
        $obj->players = parent::mapArray($data->players, PlayerDto::class);
        return $obj;
    }

}