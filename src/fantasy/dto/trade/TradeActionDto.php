<?php

namespace Fantasy\NFL\Fantasy\DTO\Trade;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class TradeActionDto extends ObjectMapsDto
{

    public $id;

    public $type;

    public $from;

    public $to;

    public $notes;

    static function mapObject($data)
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