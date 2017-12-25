<?php

namespace Fantasy\NFL\Fantasy\DTO\Trade;

use Fantasy\NFL\Resources\MapsDto;

class TradeActionDto extends MapsDto
{

    public $id;

    public $type;

    public $from;

    public $to;

    public $notes;

    static function dtomap($data)
    {
        $obj = new TradeActionDto();
        $obj->id = $data->id;
        $obj->type = $data->type;
        $obj->from = $data->from;
        $obj->to = $data->to;
        $obj->notes = self::mapArray($data->notes, TradeNoteDto::class);
        return $obj;
    }

}