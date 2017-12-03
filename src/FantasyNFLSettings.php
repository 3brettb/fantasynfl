<?php

namespace Fantasy\NFL;

use Fantasy\NFL\Resources\Session;

class FantasyNFLSettings
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
     * Get the fantasy year stored in session
     *
     * @return int
     */
    public static function getYear()
    {
        return (int)Session::get('year');
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
     * Get the fantasy team id stored in session
     *
     * @return int
     */
    public static function getTeamId()
    {
        return (int)Session::get('team_id');
    }

}