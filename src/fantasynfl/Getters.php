<?php

namespace Fantasy\NFL\FantasyNFL;

use Fantasy\NFL\Enums\RankingType;
use Fantasy\NFL\Enums\StandingsType;
use Fantasy\NFL\FantasyNFL\GetterExplicit as Explicit;
use Fantasy\NFL\FantasyNFL\Settings as StoredSettings;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

trait Getters
{

    /**
     * @param $id
     * @return \Fantasy\NFL\Fantasy\DTO\League\LeagueDto
     */
    public static function find($id)
    {
        return Explicit::find($id);
    }

    /**
     * @param null $league_id
     * @return \Fantasy\NFL\Fantasy\DTO\League\ActivityDto
     */
    public static function activity($league_id = null)
    {
        static::resolveLeague($league_id);
        return Explicit::activity($league_id);
    }

    /**
     * @param null $league_id
     * @return \Fantasy\NFL\Fantasy\DTO\League\LeagueDto
     */
    public static function league($league_id = null)
    {
        static::resolveLeague($league_id);
        return Explicit::league($league_id);
    }

    /**
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Season\SeasonDto
     */
    public static function season($year = null)
    {
        static::resolveYear($year);
        return Explicit::season($year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Season\WeeksDto
     */
    public static function weeks($year = null)
    {
        static::resolveYear($year);
        return Explicit::weeks($year, StoredSettings::getLeagueId());
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
        return Explicit::week($number, $year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $team_id
     * @return \Fantasy\NFL\Fantasy\DTO\Team\TeamDto
     */
    public static function team($team_id = null)
    {
        static::resolveTeam($team_id);
        return Explicit::team($team_id);
    }

    /**
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\League\DivisionsDto
     */
    public static function divisions($year = null)
    {
        static::resolveYear($year);
        return Explicit::divisions($year, StoredSettings::getLeagueId());
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
            return Explicit::team_division($team_id, $year, StoredSettings::getLeagueId());
        }
        return Explicit::division($division_id);
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
        return Explicit::draft($year, $league_id);
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
        return Explicit::draft_picks($team_id, $year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $team_id
     * @return \Fantasy\NFL\Fantasy\DTO\Team\RosterDto
     */
    public static function roster($team_id = null)
    {
        static::resolveTeam($team_id);
        return Explicit::roster($team_id);
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
        return Explicit::lineup($team_id, $week, $year, StoredSettings::getLeagueId());
    }

    /**
     * @param $id
     * @return \Fantasy\NFL\Fantasy\DTO\League\PlayerDto
     */
    public static function player($id)
    {
        return Explicit::player($id);
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
        return Explicit::games($week, $year, StoredSettings::getLeagueId());
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
        return Explicit::game($team_id, $week, $year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $type
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Standings\DivisionStandingsDto|\Fantasy\NFL\Fantasy\DTO\Standings\LeagueStandingsDto
     */
    public static function standings($type = null, $year = null)
    {
        static::resolveYear($year);
        switch($type)
        {
            case StandingsType::DIVISION:
                return Explicit::division_standings($year, StoredSettings::getLeagueId());
            case StandingsType::LEAGUE:
            default:
                return Explicit::league_standings($year, StoredSettings::getLeagueId());
        }

    }

    /**
     * @param null $week
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Rankings\RankingDto
     */
    public static function rankings($week = null, $year = null)
    {
        static::resolveWeek($week);
        static::resolveYear($year);
        return Explicit::rankings(RankingType::OFFICIAL, $week, $year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $week
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Rankings\RankingDto
     */
    public static function otherrankings($week = null, $year = null)
    {
        static::resolveWeek($week);
        static::resolveYear($year);
        return Explicit::rankings(RankingType::UNOFFICIAL, $week, $year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $week
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Rankings\RankingDto
     */
    public static function allrankings($week = null, $year = null)
    {
        static::resolveWeek($week);
        static::resolveYear($year);
        return Explicit::rankings(RankingType::ALL, $week, $year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Season\PlayoffsDto
     */
    public static function playoffs($year = null)
    {
        static::resolveYear($year);
        return Explicit::playoffs($year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Season\PostseasonDto
     */
    public static function postseason($year = null)
    {
        static::resolveYear($year);
        return Explicit::postseason($year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $year
     * @return \Fantasy\NFL\Fantasy\DTO\Season\OffseasonDto
     */
    public static function offseason($year = null)
    {
        static::resolveYear($year);
        return Explicit::offseason($year, StoredSettings::getLeagueId());
    }

    /**
     * @param null $team_id
     * @return \Fantasy\NFL\Fantasy\DTO\Trade\TradesDto
     */
    public static function trades($team_id = null)
    {
        if($team_id == null) return Explicit::league_trades(StoredSettings::getLeagueId());
        else return Explicit::team_trades($team_id);
    }

    /**
     * @param $trade_id
     * @return \Fantasy\NFL\Fantasy\DTO\Trade\TradeDto
     */
    public static function trade($trade_id)
    {
        return Explicit::trade($trade_id);
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