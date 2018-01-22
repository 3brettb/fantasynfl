<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class PostseasonSettingsDto extends ObjectMapsDto
{

    public $start_week;

    public $end_week;

    public $num_playoff_teams;

    static function mapObject($data)
    {
        $obj = new PostseasonSettingsDto();
        $obj->start_week = $data->start_week;
        $obj->end_week = $data->end_week;
        $obj->num_playoff_teams;
        return $obj;
    }

}