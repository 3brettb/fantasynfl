<?php

namespace Fantasy\NFL\FantasyNFL\Resolvers;

use Fantasy\NFL\Fantasy\Models\Season;
use Fantasy\NFL\FantasyNFL\Settings;

trait ResolvesSeason
{

    /**
     * @param $year
     * @return Season
     */
    public static function resolveSeasonYear($year)
    {
        return Season::where('year', $year)
                     ->where('league_id', Settings::getLeagueId())
                     ->first();
    }

    /**
     * @param $id
     * @return integer
     */
    public static function resolveOptionalSeasonId(&$id)
    {
        $id = ($id == null) ? static::resolveSeasonYear(Settings::getYear())->id : $id;
        return $id;
    }

    /**
     * @param $year
     * @return integer
     */
    public static function resolveOptionalSeasonYear(&$year)
    {
        $year = ($year == null) ? Settings::getYear() : $year;
        return $year;
    }

}