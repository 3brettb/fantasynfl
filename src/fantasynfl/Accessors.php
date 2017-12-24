<?php

namespace Fantasy\NFL\FantasyNFL;

use Fantasy\NFL\Enums\RankingType;
use Fantasy\NFL\Enums\StandingsType;
use Fantasy\NFL\FantasyNFL\Settings as StoredSettings;

trait Accessors
{

    /**
     * @param $id
     * @return \Fantasy\NFL\Fantasy\DTO\League\LeagueDto
     */
    public static function find($id)
    {
        return Accessor::find($id);
    }

    /**
     * @param null $league_id
     * @return \Fantasy\NFL\Fantasy\DTO\League\ActivityDto
     */
    public static function activity($league_id = null)
    {
        static::resolveLeague($league_id);
        return Accessor::activity($league_id);
    }

    /**
     * @param null $league_id
     * @return \Fantasy\NFL\Fantasy\DTO\League\LeagueDto
     */
    public static function league($league_id = null)
    {
        static::resolveLeague($league_id);
        return Accessor::league($league_id);
    }

    /**
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Season\SeasonDto
     */
    public static function season($year = null)
    {
        static::resolveYear($year);
        return Accessor::season($year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Season\WeeksDto
     */
    public static function weeks($year = null)
    {
        static::resolveYear($year);
        return Accessor::weeks($year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $number
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Week\WeekDto
     */
    public static function week($number = null, $year = null)
    {
        static::resolveWeek($number);
        static::resolveYear($year);
        return Accessor::week($number, $year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $team_id
     * @return \Fantasy\NFL\Fantasy\DTO\Team\TeamDto
     */
    public static function team($team_id = null)
    {
        static::resolveTeam($team_id);
        return Accessor::team($team_id);
    }

    /**
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\League\DivisionsDto
     */
    public static function divisions($year = null)
    {
        static::resolveYear($year);
        return Accessor::divisions($year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $division_id
     * @param null $team_id
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\League\DivisionDto
     */
    public static function division($division_id = null, $team_id = null, $year = null)
    {
        if($division_id == null)
        {
            static::resolveTeam($team_id);
            static::resolveYear($year);
            return Accessor::team_division($team_id, $year, StoredSettings::getLeagueId());
        }
        return Accessor::division($division_id);
    }

    /**
     * @param null $year
     * @param null $league_id
     * @return \Fantasy\NFL\Fantasy\DTO\Draft\DraftDto
     */
    public static function draft($year = null, $league_id = null)
    {
        static::resolveYear($year);
        static::resolveLeague($league_id);
        return Accessor::draft($year, $league_id);
    }

    /**
     * @param null $team_id
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Draft\DraftPicksDto
     */
    public static function draftpicks($team_id = null, $year = null)
    {
        static::resolveTeam($team_id);
        static::resolveYear($year);
        return Accessor::draft_picks($team_id, $year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $team_id
     * @return \Fantasy\NFL\Fantasy\DTO\Team\RosterDto
     */
    public static function roster($team_id = null)
    {
        static::resolveTeam($team_id);
        return Accessor::roster($team_id);
    }

    /**
     * @param null $week
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Team\LineupDto
     */
    public static function mylineup($week = null, $year = null)
    {
        $team_id = StoredSettings::getTeamId();
        return self::lineup($team_id, $week, $year);
    }

    /**
     * @param null $team_id
     * @param null $week
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Team\LineupDto
     */
    public static function lineup($team_id = null, $week = null, $year = null)
    {
        static::resolveTeam($team_id);
        static::resolveWeek($week);
        static::resolveYear($year);
        return Accessor::lineup($team_id, $week, $year, StoredSettings::getLeagueId());
    }

    /**
     * @param $id
     * @return \Fantasy\NFL\Fantasy\DTO\League\PlayerDto
     */
    public static function player($id)
    {
        return Accessor::player($id);
    }

    /**
     * @param null $week
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Week\GamesDto
     */
    public static function games($week = null, $year = null)
    {
        static::resolveWeek($week);
        static::resolveYear($year);
        return Accessor::games($week, $year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $week
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Week\GameDto
     */
    public static function mygame($week = null, $year = null)
    {
        return self::game(StoredSettings::getTeamId(), $week, $year);
    }

    /**
     * @param null $team_id
     * @param null $week
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Week\GameDto
     */
    public static function game($team_id = null, $week = null, $year = null)
    {
        static::resolveTeam($team_id);
        static::resolveWeek($week);
        static::resolveYear($year);
        return Accessor::game($team_id, $week, $year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $type
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Standings\StandingsDto
     */
    public static function standings($type = null, $year = null)
    {
        static::resolveYear($year);
        switch($type)
        {
            case StandingsType::DIVISION:
                return Accessor::division_standings($year, StoredSettings::getLeagueId());
            case StandingsType::LEAGUE:
            default:
                return Accessor::league_standings($year, StoredSettings::getLeagueId());
        }

    }

    /**
     * @param null $week
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Rankings\RankingsDto
     */
    public static function rankings($week = null, $year = null)
    {
        static::resolveWeek($week);
        static::resolveYear($year);
        return Accessor::rankings(RankingType::OFFICIAL, $week, $year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $week
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Rankings\RankingsDto
     */
    public static function otherrankings($week = null, $year = null)
    {
        static::resolveWeek($week);
        static::resolveYear($year);
        return Accessor::rankings(RankingType::UNOFFICIAL, $week, $year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $week
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Rankings\RankingsDto
     */
    public static function allrankings($week = null, $year = null)
    {
        static::resolveWeek($week);
        static::resolveYear($year);
        return Accessor::rankings(RankingType::ALL, $week, $year, StoredSettings::getLeagueId());
    }

    /**
     * @param $type
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Season\PostseasonDto
     */
    public static function postseason($type, $year = null)
    {
        static::resolveYear($year);
        return Accessor::postseason($type, $year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $team_id
     * @return \Fantasy\NFL\Fantasy\DTO\Trade\TradesDto
     */
    public static function trades($team_id = null)
    {
        if($team_id == null) return Accessor::league_trades(StoredSettings::getLeagueId());
        else return Accessor::team_trades($team_id);
    }

    /**
     * @param $trade_id
     * @return \Fantasy\NFL\Fantasy\DTO\Trade\TradeDto
     */
    public static function trade($trade_id)
    {
        return Accessor::trade($trade_id);
    }

    // Private Helper Methods ------------------------------------------------------------------------------------------

    private static function resolveYear(&$year)
    {
        if($year == null) $year = StoredSettings::getYear();
    }

    private static function resolveWeek(&$week)
    {
        if($week == null) $week = StoredSettings::getWeekNumber();
    }

    private static function resolveTeam(&$team)
    {
        if($team == null) $team = StoredSettings::getTeamId();
    }

    private static function resolveLeague(&$league)
    {
        if($league == null) $league = StoredSettings::getLeagueId();
    }

}