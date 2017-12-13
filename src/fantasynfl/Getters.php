<?php

namespace Fantasy\NFL\FantasyNFL;

use Fantasy\NFL\Enums\RankingType;
use Fantasy\NFL\Enums\StandingsType;
use Fantasy\NFL\FantasyNFL\GetterExplicit as Explicit;
use Fantasy\NFL\FantasyNFL\Settings as StoredSettings;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

trait Getters
{

    public static function find($id)
    {
        return Explicit::find($id);
    }

    public static function activity($league_id = null)
    {
        static::resolveLeague($league_id);
        return Explicit::activity($league_id);
    }

    public static function league($league_id = null)
    {
        static::resolveLeague($league_id);
        return Explicit::league($league_id);
    }

    public static function season($year = null)
    {
        static::resolveYear($year);
        return Explicit::season($year, StoredSettings::getLeagueId());
    }

    public static function weeks($year = null)
    {
        static::resolveYear($year);
        return Explicit::weeks($year, StoredSettings::getLeagueId());
    }

    public static function week($number = null, $year = null)
    {
        static::resolveWeek($number);
        static::resolveYear($year);
        return Explicit::week($number, $year, StoredSettings::getLeagueId());
    }

    public static function team($team_id = null)
    {
        static::resolveTeam($team_id);
        return Explicit::team($team_id);
    }

    public static function divisions($year = null)
    {
        static::resolveYear($year);
        return Explicit::divisions($year, StoredSettings::getLeagueId());
    }

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

    public static function draft($year = null, $league_id = null)
    {
        static::resolveYear($year);
        static::resolveLeague($league_id);
        return Explicit::draft($year, $league_id);
    }

    public static function draftpicks($team_id = null, $year = null)
    {
        static::resolveTeam($team_id);
        static::resolveYear($year);
        return Explicit::draft_picks($team_id, $year, StoredSettings::getLeagueId());
    }

    public static function roster($team_id = null)
    {
        static::resolveTeam($team_id);
        return Explicit::roster($team_id);
    }

    public static function mylineup($week = null, $year = null)
    {
        $team_id = StoredSettings::getTeamId();
        return self::lineup($team_id, $week, $year);
    }

    public static function lineup($team_id = null, $week = null, $year = null)
    {
        static::resolveTeam($team_id);
        static::resolveWeek($week);
        static::resolveYear($year);
        return Explicit::lineup($team_id, $week, $year, StoredSettings::getLeagueId());
    }

    public static function player($id)
    {
        return Explicit::player($id);
    }

    public static function games($week = null, $year = null)
    {
        static::resolveWeek($week);
        static::resolveYear($year);
        return Explicit::games($week, $year, StoredSettings::getLeagueId());
    }

    public static function mygame($week = null, $year = null)
    {
        return self::game(StoredSettings::getTeamId(), $week, $year);
    }

    public static function game($team_id = null, $week = null, $year = null)
    {
        static::resolveTeam($team_id);
        static::resolveWeek($week);
        static::resolveYear($year);
        return Explicit::game($team_id, $week, $year, StoredSettings::getLeagueId());
    }

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

    public static function rankings($week = null, $year = null)
    {
        static::resolveWeek($week);
        static::resolveYear($year);
        return Explicit::rankings(RankingType::OFFICIAL, $week, $year, StoredSettings::getLeagueId());
    }

    public static function otherrankings($week = null, $year = null)
    {
        static::resolveWeek($week);
        static::resolveYear($year);
        return Explicit::rankings(RankingType::UNOFFICIAL, $week, $year, StoredSettings::getLeagueId());
    }

    public static function allrankings($week = null, $year = null)
    {
        static::resolveWeek($week);
        static::resolveYear($year);
        return Explicit::rankings(RankingType::ALL, $week, $year, StoredSettings::getLeagueId());
    }

    public static function playoffs($year = null)
    {
        static::resolveYear($year);
        return Explicit::playoffs($year, StoredSettings::getLeagueId());
    }

    public static function postseason($year = null)
    {
        static::resolveYear($year);
        return Explicit::postseason($year, StoredSettings::getLeagueId());
    }

    public static function offseason($year = null)
    {
        static::resolveYear($year);
        return Explicit::offseason($year, StoredSettings::getLeagueId());
    }

    public static function trades($team_id = null)
    {
        if($team_id == null) return Explicit::league_trades(StoredSettings::getLeagueId());
        else return Explicit::team_trades($team_id);
    }

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