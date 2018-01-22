<?php

namespace Fantasy\NFL\Fantasy\DTO\Trade;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class TradeNoteDto extends ObjectMapsDto
{

    public $user_id;

    public $note;

    public $date;

    static function mapObject($data)
    {
        $obj = new TradeNoteDto();
        $obj->user_id = $data->id;
        $obj->note = $data->note;
        $obj->date = $data->date;
        return $obj;
    }

}