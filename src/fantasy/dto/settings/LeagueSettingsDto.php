<?php

namespace Fantasy\NFL\Fantasy\DTO\Settings;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class LeagueSettingsDto extends ObjectMapsDto
{

    public $id;

    public $roster;

    public $scoring;

    public $season;

    public $waivers;

    public $trades;

    public $postseason;

    static function mapObject($data)
    {
        $obj = new LeagueSettingsDto();
        $obj->id = $data->id;
        $obj->roster = RosterSettingsDto::map($data->roster);
        $obj->scoring = ScoringSettingsDto::map($data->scoring);
        $obj->season = SeasonSettingsDto::map($data->season);
        $obj->waivers = WaiverSettingsDto::map($data->waivers);
        $obj->trades = TradeSettingsDto::map($data->trades);
        $obj->postseason = PostseasonSettingsDto::map($data->postseason);
        return $obj;
    }

}