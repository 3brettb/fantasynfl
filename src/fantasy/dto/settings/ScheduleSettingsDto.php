<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class ScheduleSettingsDto extends ObjectMapsDto
{

    public $start_week;

    public $end_week;

    static function mapObject($data)
    {
        $obj = new ScheduleSettingsDto();
        $obj->start_week = $data->start_week;
        $obj->end_week = $data->end_week;
        return $obj;
    }

}