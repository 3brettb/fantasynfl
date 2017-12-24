<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\API\DTO\MapsDto;

class ScheduleSettingsDto extends MapsDto
{

    public $start_week;

    public $end_week;

    static function dtomap($data)
    {
        $obj = new ScheduleSettingsDto();
        $obj->start_week = $data->start_week;
        $obj->end_week = $data->end_week;
        return $obj;
    }

}