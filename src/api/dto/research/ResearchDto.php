<?php

namespace Fantasy\NFL\API\DTO\Research;

use Fantasy\NFL\Resources\MapsDto;

class ResearchDto extends MapsDto
{

    public $lastUpdated;

    public $players;

    public static function dtomap($data)
    {
        $obj = new ResearchDto();
        $obj->lastUpdated = $data->lastUpdated;
        $obj->players = parent::mapArray($data->players, PlayerDto::class);
        return $obj;
    }

}