<?php

namespace Fantasy\NFL\FantasyNFL;

use Fantasy\NFL\Fantasy\DTO as FantasyDTO;
use Fantasy\NFL\FantasyNFL\Settings as StoredSettings;
use Fantasy\NFL\Fantasy\Models as FantasyModel;

trait Modifiers
{

    /**
     * @param $id
     */
    public static function setLeague($id)
    {
        StoredSettings::setLeagueId($id);
    }

    /**
     * @param $season
     */
    public static function setSeason($season)
    {
        StoredSettings::setSeasonId($season->id);
        StoredSettings::setYear($season->year);
    }

    /**
     * @param $week
     */
    public static function setWeek($week)
    {
        StoredSettings::setWeekId($week->id);
        StoredSettings::setWeekNumber($week->number);
    }

    /**
     * @param $id
     */
    public static function setTeamId($id)
    {
        StoredSettings::setTeamId($id);
    }

    /**
     * @param $data
     * @return FantasyDTO\League\LeagueDto
     */
    public static function createLeague($data)
    {
        return FantasyModel\League::create($data);
    }

}