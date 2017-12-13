<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\API\DTO\MapsDto;

class LeagueSettingsDto extends MapsDto
{

    public $id;

    public $roster;

    public $season;

    public $offseason;

    public $postseason;

    static function dtomap($data)
    {
        $obj = new LeagueSettingsDto();
        $obj->id = $data->id;
        $obj->roster = RosterSettingsDto::dtomap($data->roster);
        $obj->season = SeasonSettingsDto::dtomap($data->season);
        $obj->offseason = OffseasonSettingsDto::dtomap($data->offseason);
        $obj->postseason = PostseasonSettingsDto::dtomap($data->postseason);
        return $obj;
    }

}