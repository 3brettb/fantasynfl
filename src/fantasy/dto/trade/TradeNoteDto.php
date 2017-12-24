<?php

namespace Fantasy\NFL\Fantasy\DTO\Trade;

use Fantasy\NFL\API\DTO\MapsDto;

class TradeNoteDto extends MapsDto
{

    public $user_id;

    public $note;

    public $date;

    static function dtomap($data)
    {
        $obj = new TradeNoteDto();
        $obj->user_id = $data->id;
        $obj->note = $data->note;
        $obj->date = $data->date;
        return $obj;
    }

}