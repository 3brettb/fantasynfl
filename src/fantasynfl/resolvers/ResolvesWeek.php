<?php

namespace Fantasy\NFL\FantasyNFL\Resolvers;

use Fantasy\NFL\Fantasy\Models\Week;
use Fantasy\NFL\FantasyNFL\Settings;

trait ResolvesWeek
{

    /**
     * @param $number
     * @param $year
     * @return Week
     */
    public static function resolveWeekNumber($number, $year=null)
    {
        $season = ResolvesSeason::resolveSeasonYear(ResolvesSeason::resolveOptionalSeasonYear($year));
        return Week::where('season_id', $season->id)
            ->where('number', $number)
            ->first();
    }

    /**
     * @param $id
     * @return integer
     */
    public static function resolveOptionalWeekId(&$id)
    {
        $id = ($id == null) ? static::resolveWeekNumber(Settings::getWeekNumber())->id : $id;
        return $id;
    }

    /**
     * @param $number
     * @return integer
     */
    public static function resolveOptionalWeekNumber(&$number)
    {
        $number = ($number == null) ? Settings::getWeekNumber() : $number;
        return $number;
    }

}