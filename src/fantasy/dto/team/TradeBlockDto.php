<?php

namespace Fantasy\NFL\Fantasy\DTO\Team;

use Fantasy\NFL\Resources\MapsDto;

class TradeBlockDto extends MapsDto
{

    public $lastUpdated;

    public $available;

    public $looking;

    public $block;

    public $locked;

    public $notes;

    static function dtomap($data)
    {
        $obj = new TradeBlockDto();
        $obj->lastUpdated = $data->lastUpdated;
        $obj->available = $data->available;
        $obj->looking = $data->looking;
        $obj->block = $data->block;
        $obj->locked = $data->locked;
        $obj->notes = $data->notes;
        return $obj;
    }

}