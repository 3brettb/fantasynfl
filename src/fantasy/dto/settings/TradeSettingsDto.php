<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class TradeSettingsDto extends ObjectMapsDto
{

    public $allow;

    public $deadline;

    public $limit;

    public $review;

    static function mapObject($data)
    {
        $obj = new TradeSettingsDto();
        $obj->allow = $data->allow;
        $obj->deadline = $data->deadline;
        $obj->limit = $data->limit;
        $obj->review = $data->review;
        return $obj;
    }

}