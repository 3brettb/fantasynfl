<?php

namespace Fantasy\NFL\FantasyNFL;

use Fantasy\NFL\Resources\Session;

class Settings
{

    /**
     * Returns the saved league id from session
     *
     * @return integer
     */
    public static function getLeagueId()
    {
        return (int)Session::get('league_id');
    }

    /**
     * Set the saved league id in the session
     *
     * @param $id
     * @return void
     */
    public static function setLeagueId($id)
    {
        Session::set('league_id', $id);
    }

    /**
     * @param $id
     */
    public static function setSeasonId($id)
    {
        Session::set('season_id', $id);
    }

    /**
     * Get the fantasy season id stored in session
     *
     * @return int
     */
    public static function getSeasonId()
    {
        return (int)Session::get('season_id');
    }

    /**
     * @param $year
     */
    public static function setYear($year)
    {
        Session::set('year', $year);
    }

    /**
     * Get the fantasy year stored in session
     *
     * @return int
     */
    public static function getYear()
    {
        return (int)Session::get('year');
    }

    /**
     * @param $id
     */
    public static function setWeekId($id)
    {
        Session::set('week_id', $id);
    }

    /**
     * Get the fantasy week id stored in session
     *
     * @return int
     */
    public static function getWeekId()
    {
        return (int)Session::get('week_id');
    }

    /**
     * @param $number
     */
    public static function setWeekNumber($number)
    {
        Session::set('week_number', $number);
    }

    /**
     * Get the fantasy week stored in session
     *
     * @return int
     */
    public static function getWeekNumber()
    {
        return (int)Session::get('week_number');
    }

    /**
     * @param $team_id
     */
    public static function setTeamId($team_id)
    {
        Session::set('team_id', $team_id);
    }

    /**
     * Get the fantasy team id stored in session
     *
     * @return int
     */
    public static function getTeamId()
    {
        return (int)Session::get('team_id');
    }

}