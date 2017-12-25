<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\Resources\MapsDto;

class SeasonSettingsDto extends MapsDto
{

    public $divisions;

    public $roster_lock;

    public $waiver_type;

    public $waiver_limit;

    public $waiver_period;

    public $allow_trades;

    public $trade_limit;

    public $trade_deadline;

    public $trade_review;

    public $schedule;

    static function dtomap($data)
    {
        $obj = new SeasonSettingsDto();
        $obj->divisions = self::mapArray($data->divisions, DivisionSettingsDto::class);
        $obj->schedule = ScheduleSettingsDto::dtomap($data->schedule);
        return $obj;
    }

}