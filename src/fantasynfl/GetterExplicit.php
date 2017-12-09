<?php

namespace Fantasy\NFL\FantasyNFL;

use Fantasy\NFL\StatsAPI\Objects as StatsObject;
use Fantasy\NFL\Fantasy\Objects as Object;

use Fantasy\NFL\Fantasy\Models as FantasyModels;
use Fantasy\NFL\StatsAPI\Models as StatsModels;
use Illuminate\Support\Collection;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

class GetterExplicit
{

    /**
     * Find a league by id
     * @param $league_id
     * @return Object\League
     */
    public static function find($league_id)
    {
        $league = FantasyModels\League::find($league_id);
        return Object\League::mapModel($league);
    }

    /**
     * Find a league by id
     * @param $league_id
     * @return Object\League
     */
    public static function league($league_id)
    {
        return static::find($league_id);
    }

    /**
     * @param $year
     * @param $league_id
     * @return Collection
     */
    public static function activity($year, $league_id)
    {
        $season = static::getSeason($year, $league_id);
        return Object\Activitys::mapModels($season->activity);
    }

    /**
     * Find Season
     * @param $season_number
     * @param $league_id
     * @return Object\Season
     */
    public static function season($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return Object\Season::mapModel($season);
    }

    /**
     * Get Season Week collection
     * @param $season_number
     * @param $league_id
     * @return Collection
     */
    public static function weeks($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return Object\Weeks::mapModels($season->weeks);
    }

    /**
     * Return a Week
     * @param $week_number
     * @param $season_number
     * @param $league_id
     * @return Object\Week
     */
    public static function week($week_number, $season_number, $league_id)
    {
        $week = static::getWeek($week_number, $season_number, $league_id);
        return Object\Week::mapModel($week);
    }

    /**
     * @param $league_id
     * @return Collection
     */
    public static function teams($league_id)
    {
        $teams = FantasyModels\Team::where('league_id', $league_id);
        return Object\Teams::mapModels($teams);
    }

    /**
     * Find a Team
     * @param $team_id
     * @return Object\Team
     */
    public static function team($team_id)
    {
        $team = FantasyModels\Team::find($team_id);
        return Object\Team::mapModel($team);
    }

    /**
     * Return Division Collection
     * @param $season_number
     * @param $league_id
     * @return Collection
     */
    public static function divisions($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        $divisions = FantasyModels\Division::where('season_id', $season->id)->get();
        return Object\Divisions::mapModels($divisions);
    }

    /**
     * @param $division_id
     * @return Object\Division
     */
    public static function division($division_id)
    {
        $division = FantasyModels\Division::find($division_id);
        return Object\Division::mapModel($division);
    }

    /**
     * @param $team_id
     * @param $season_number
     * @param $league_id
     * @return Object\Division
     */
    public static function team_division($team_id, $season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        $divisions = $season->divisions()->pluck('id')->toArray();
        $division = FantasyModels\DivisionTeam::where('team_id', $team_id)->whereIn('division_id', $divisions)->first();
        return Object\Division::mapModel($division);
    }

    /**
     * @param $year
     * @param $league_id
     * @return Object\Draft
     */
    public static function draft($year, $league_id)
    {
        $season = static::getSeason($year, $league_id);
        return Object\Draft::mapModel($season->draft);
    }

    /**
     * @param $team_id
     * @param $year
     * @param $league_id
     * @return Collection
     */
    public static function draft_picks($team_id, $year, $league_id)
    {
        $team = FantasyModels\Team::find($team_id);
        $season = static::getSeason($year, $league_id);
        $picks = $team->picks()->where('draft_id', $season->draft->id)->get();
        return Object\DraftPicks::mapModels($picks);
    }

    /**
     * @param $team_id
     * @param $week_number
     * @param $season_number
     * @param $league_id
     * @return Object\Lineup
     */
    public static function lineup($team_id, $week_number, $season_number, $league_id)
    {
        $week = static::getWeek($week_number, $season_number, $league_id);
        $roster = FantasyModels\Lineup::where('team_id', $team_id)->where('week_id', $week->id)->first();
        return Object\Lineup::mapModel($roster);
    }

    /**
     * @param $team_id
     * @return Object\Roster
     */
    public static function roster($team_id)
    {
        $players = FantasyModels\RosterPlayer::where('team_id', $team_id);
        return Object\Roster::mapModels($players);
    }

    /**
     * @return Collection
     */
    public static function players()
    {
        return DataReceiver::instance()->getPlayers();
    }

    /**
     * @param $player_id
     * @return StatsObject\Player
     */
    public static function player($player_id)
    {
        $player = StatsModels\Player::find($player_id);
        return StatsObject\Player::mapModel($player);
    }

    /**
     * @param $week_number
     * @param $season_number
     * @param $league_id
     * @return Collection
     */
    public static function games($week_number, $season_number, $league_id)
    {
        $week = static::getWeek($week_number, $season_number, $league_id);
        return Object\Games::mapModels($week->games);
    }

    /**
     * @param $team_id
     * @param $week_number
     * @param $season_number
     * @param $league_id
     * @return Object\Game
     */
    public static function game($team_id, $week_number, $season_number, $league_id)
    {
        $week = static::getWeek($week_number, $season_number, $league_id);
        $game = $week->games()->where('home_id', $team_id)->orWhere('away_id', $team_id)->first();
        return Object\Game::mapModel($game);
    }

    /**
     * @param $season_number
     * @param $league_id
     * @return Object\Standings
     */
    public static function league_standings($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return Object\Standings::mapJson($season->standings);
    }

    public static function division_standings($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        $standings = $season->divisions()->pluck('standings')->toArray();
        return Object\StandingsGroup::mapJsons($standings);
    }

    /**
     * @param $division_id
     * @return Object\Standings
     */
    public static function division_standing($division_id)
    {
        $division = FantasyModels\Division::find($division_id);
        return Object\Standings::mapJson($division->standings);
    }

    /**
     * @param $type
     * @param $week_number
     * @param $season_number
     * @param $league_id
     * @return Collection
     */
    public static function rankings($type, $week_number, $season_number, $league_id)
    {
        $week = static::getWeek($week_number, $season_number, $league_id);
        $rankings = $week->rankings()->where('type', $type)->get();
        return Object\Rankings::mapModels($rankings);
    }

    /**
     * @param $season_number
     * @param $league_id
     * @return Object\Playoffs
     */
    public static function playoffs($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return Object\Playoffs::mapModel($season);
    }

    /**
     * @param $season_number
     * @param $league_id
     * @return Object\Postseason
     */
    public static function postseason($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return Object\Postseason::mapModel($season);
    }

    /**
     * @param $season_number
     * @param $league_id
     * @return Object\Offseason
     */
    public static function offseason($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return Object\Offseason::mapModel($season);
    }

    /**
     * @param $trade_id
     * @return Object\Trade
     */
    public static function trade($trade_id)
    {
        $trade = FantasyModels\Trade::find($trade_id);
        return Object\Trade::mapModel($trade);
    }

    /**
     * @param $season_number
     * @param $league_id
     * @return Collection
     */
    public static function league_trades($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return Object\Trades::mapModels($season->trades);
    }

    /**
     * @param $team_id
     * @param $season_number
     * @param $league_id
     * @return Collection
     */
    public static function team_trades($team_id, $season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        $trades = FantasyModels\Team::find($team_id)->trades()->where('season_id', $season->id)->get();
        return Object\Trades::mapModels($trades);
    }

    // ----------------------------------------------------------------------------------------------------
    // Private Helper Methods -----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------------------------------

    /**
     * @param $season_number
     * @param $league_id
     * @return FantasyModels\Season
     */
    private static function getSeason($season_number, $league_id)
    {
        return FantasyModels\Season::where('league_id', $league_id)->where('year', $season_number)->first();
    }

    /**
     * @param $week_number
     * @param $season_number
     * @param $league_id
     * @return FantasyModels\Week
     */
    private static function getWeek($week_number, $season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return $season->weeks()->where('number', $week_number)->first();
    }

}