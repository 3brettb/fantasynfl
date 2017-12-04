<?php

namespace Fantasy\NFL;

use Fantasy\NFL\Enums\RankingType;
use Fantasy\NFL\FantasyNFLExplicit as Explicit;
use Fantasy\NFL\FantasyNFLSettings as StoredSettings;

class FantasyNFL
{

    public static function find($id)
    {
        return Explicit::find($id);
    }

    public static function setLeague($id)
    {
        StoredSettings::setLeagueId($id);
    }

    public static function league($league_id = null)
    {
        if($league_id == null) $league_id = StoredSettings::getLeagueId();
        return Explicit::league($league_id);
    }

    public static function season($year = null)
    {
        if($year == null) $year = StoredSettings::getYear();
        return Explicit::season($year, StoredSettings::getLeagueId());
    }

    public static function weeks($year = null)
    {
        if($year == null) $year = StoredSettings::getYear();
        return Explicit::weeks($year, StoredSettings::getLeagueId());
    }

    public static function week($number = null, $year = null)
    {
        if($number == null) $number = StoredSettings::getWeekNumber();
        if($year == null) $year = StoredSettings::getYear();
        return Explicit::week($number, $year, StoredSettings::getLeagueId());
    }

    public static function team($team_id = null)
    {
        if($team_id == null) $team_id = StoredSettings::getTeamId();
        return Explicit::team($team_id);
    }

    public static function divisions($year = null)
    {
        if($year == null) $year = StoredSettings::getYear();
        return Explicit::divisions($year, StoredSettings::getLeagueId());
    }

    public static function division($team_id = null, $year = null)
    {
        if($team_id == null) $team_id = StoredSettings::getTeamId();
        if($year == null) $year = StoredSettings::getYear();
        return Explicit::division($team_id, $year, StoredSettings::getLeagueId());
    }

    public static function myroster($week = null, $year = null)
    {
        $team_id = StoredSettings::getTeamId();
        return self::roster($team_id, $week, $year);
    }

    public static function roster($team_id = null, $week = null, $year = null)
    {
        if($team_id == null) $team_id = StoredSettings::getTeamId();
        if($week == null) $week = StoredSettings::getWeekNumber();
        if($year == null) $year = StoredSettings::getYear();
        return Explicit::roster($team_id, $week, $year, StoredSettings::getLeagueId());
    }

    public static function player($id)
    {
        return Explicit::player($id);
    }

    public static function games($week = null, $year = null)
    {
        if($week == null) $week = StoredSettings::getWeekNumber();
        if($year == null) $year = StoredSettings::getYear();
        return Explicit::games($week, $year, StoredSettings::getLeagueId());
    }

    public static function mygame($week = null, $year = null)
    {
        return self::game(StoredSettings::getTeamId(), $week, $year);
    }

    public static function game($team_id = null, $week = null, $year = null)
    {
        if($team_id == null) $team_id = StoredSettings::getTeamId();
        if($week == null) $week = StoredSettings::getWeekNumber();
        if($year == null) $year = StoredSettings::getYear();
        return Explicit::game($team_id, $week, $year, StoredSettings::getLeagueId());
    }

    public static function standings($year = null)
    {
        if($year == null) $year = StoredSettings::getYear();
        return Explicit::standings($year, StoredSettings::getLeagueId());
    }

    public static function rankings($week = null, $year = null)
    {
        if($week == null) $week = StoredSettings::getWeekNumber();
        if($year == null) $year = StoredSettings::getYear();
        return Explicit::rankings(RankingType::OFFICIAL, $week, $year, StoredSettings::getLeagueId());
    }

    public static function otherrankings($week = null, $year = null)
    {
        if($week == null) $week = StoredSettings::getWeekNumber();
        if($year == null) $year = StoredSettings::getYear();
        return Explicit::rankings(RankingType::UNOFFICIAL, $week, $year, StoredSettings::getLeagueId());
    }

    public static function allrankings($week = null, $year = null)
    {
        if($week == null) $week = StoredSettings::getWeekNumber();
        if($year == null) $year = StoredSettings::getYear();
        return Explicit::rankings(RankingType::ALL, $week, $year, StoredSettings::getLeagueId());
    }

    public static function playoffs($year = null)
    {
        if($year == null) $year = StoredSettings::getYear();
        return Explicit::playoffs($year, StoredSettings::getLeagueId());
    }

    public static function postseason($year = null)
    {
        if($year == null) $year = StoredSettings::getYear();
        return Explicit::postseason($year, StoredSettings::getLeagueId());
    }

    public static function offseason($year = null)
    {
        if($year == null) $year = StoredSettings::getYear();
        return Explicit::offseason($year, StoredSettings::getLeagueId());
    }

}