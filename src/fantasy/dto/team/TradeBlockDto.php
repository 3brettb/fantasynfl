<?php

namespace Fantasy\NFL\Fantasy\DTO\Team;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class TradeBlockDto extends ObjectMapsDto
{

    public $lastUpdated;

    public $available;

    public $looking;

    public $block;

    public $locked;

    public $notes;

    static function mapObject($data)
    {
        try {
            $obj = new TradeBlockDto();
            $obj->lastUpdated = $data->lastUpdated;
            $obj->available = $data->available;
            $obj->looking = $data->looking;
            $obj->block = $data->block;
            $obj->locked = $data->locked;
            $obj->notes = $data->notes;
            return $obj;
        } catch(\ErrorException $e) {
            return null;
        }
    }

}