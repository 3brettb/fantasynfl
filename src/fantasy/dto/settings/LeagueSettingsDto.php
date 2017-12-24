<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\API\DTO\MapsDto;

class LeagueSettingsDto extends MapsDto
{

    public $id;

    public $roster;

    public $scoring;

    public $season;

    public $waivers;

    public $trades;

    public $postseason;

    static function dtomap($data)
    {
        $obj = new LeagueSettingsDto();
        $obj->id = $data->id;
        $obj->roster = RosterSettingsDto::dtomap($data->roster);
        $obj->scoring = ScoringSettingsDto::dtomap($data->scoring);
        $obj->season = SeasonSettingsDto::dtomap($data->season);
        $obj->waivers = WaiverSettingsDto::dtomap($data->waivers);
        $obj->trades = TradeSettingsDto::dtomap($data->trades);
        $obj->postseason = PostseasonSettingsDto::dtomap($data->postseason);
        return $obj;
    }

}