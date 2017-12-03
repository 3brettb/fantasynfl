<?php

namespace Fantasy\NFL;

use Fantasy\NFL\Fantasy\Objects\Division;
use Fantasy\NFL\Fantasy\Objects\Game;
use Fantasy\NFL\Fantasy\Objects\League;
use Fantasy\NFL\Fantasy\Objects\Offseason;
use Fantasy\NFL\Fantasy\Objects\Player;
use Fantasy\NFL\Fantasy\Objects\Playoffs;
use Fantasy\NFL\Fantasy\Objects\Postseason;
use Fantasy\NFL\Fantasy\Objects\Rankings;
use Fantasy\NFL\Fantasy\Objects\Roster;
use Fantasy\NFL\Fantasy\Objects\Season;
use Fantasy\NFL\Fantasy\Objects\Standings;
use Fantasy\NFL\Fantasy\Objects\Team;
use Fantasy\NFL\Fantasy\Objects\Week;

class FantasyNFLExplicit
{

    /**
     * Find a league by id
     * @param $league_id
     * @return League
     */
    public static function find($league_id)
    {
        //
    }

    /**
     * Find a league by id
     * @param $league_id
     * @return League
     */
    public static function league($league_id)
    {
        //
    }

    /**
     * Find Season
     * @param $season_number
     * @param $league_id
     * @return Season
     */
    public static function season($season_number, $league_id)
    {
        //
    }

    /**
     * Get Season Week collection
     * @param $season_number
     * @param $league_id
     * @return Week[]
     */
    public static function weeks($season_number, $league_id)
    {
        //
    }

    /**
     * Return a Week
     * @param $week_number
     * @param $season_number
     * @param $league_id
     * @return Week
     */
    public static function week($week_number, $season_number, $league_id)
    {
        //
    }

    /**
     * Find a Team
     * @param $team_id
     * @return Team
     */
    public static function team($team_id)
    {
        //
    }

    /**
     * Return Division Collection
     * @param $season_number
     * @param $league_id
     * @return Division[]
     */
    public static function divisions($season_number, $league_id)
    {
        //
    }

    /**
     * @param $team_id
     * @param $season_number
     * @param $league_id
     * @return Division
     */
    public static function division($team_id, $season_number, $league_id)
    {
        //
    }

    /**
     * @param $team_id
     * @param $week_number
     * @param $season_number
     * @return Roster
     */
    public static function roster($team_id, $week_number, $season_number)
    {
        //
    }

    /**
     * @param $player_id
     * @return Player
     */
    public static function player($player_id)
    {
        //
    }

    /**
     * @param $week_number
     * @param $season_number
     * @param $league_id
     * @return Game[]
     */
    public static function games($week_number, $season_number, $league_id)
    {
        //
    }

    /**
     * @param $team_id
     * @param $week_number
     * @param $season_number
     * @return Game
     */
    public static function game($team_id, $week_number, $season_number)
    {
        //
    }

    /**
     * @param $season_number
     * @param $league_id
     * @return Standings
     */
    public static function standings($season_number, $league_id)
    {
        //
    }

    /**
     * @param $type
     * @param $week_number
     * @param $season_number
     * @param $league_id
     * @return Rankings[]
     */
    public static function rankings($type, $week_number, $season_number, $league_id)
    {
        //
    }

    /**
     * @param $season_number
     * @param $league_id
     * @return Playoffs
     */
    public static function playoffs($season_number, $league_id)
    {
        //
    }

    /**
     * @param $season_number
     * @param $league_id
     * @return Postseason
     */
    public static function postseason($season_number, $league_id)
    {
        //
    }

    /**
     * @param $season_number
     * @param $league_id
     * @return Offseason
     */
    public static function offseason($season_number, $league_id)
    {
    //
    }

}