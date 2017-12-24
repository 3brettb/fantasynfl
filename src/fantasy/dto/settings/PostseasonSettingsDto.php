<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\API\DTO\MapsDto;

class PostseasonSettingsDto extends MapsDto
{

    public $start_week;

    public $end_week;

    public $num_playoff_teams;

    static function dtomap($data)
    {
        $obj = new PostseasonSettingsDto();
        $obj->start_week = $data->start_week;
        $obj->end_week = $data->end_week;
        $obj->num_playoff_teams;
        return $obj;
    }

}