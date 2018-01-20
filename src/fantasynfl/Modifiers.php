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
     * @param $year
     */
    public static function setYear($year)
    {
        StoredSettings::setYear($year);
    }

    /**
     * @param $number
     */
    public static function setWeek($number)
    {
        StoredSettings::setWeekNumber($number);
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