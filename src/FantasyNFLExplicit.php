<?php

namespace Fantasy\NFL;

use Fantasy\NFL\Fantasy\Objects\Division as DivisionObject;
use Fantasy\NFL\Fantasy\Objects\Divisions as DivisionsObject;
use Fantasy\NFL\Fantasy\Objects\Game as GameObject;
use Fantasy\NFL\Fantasy\Objects\Games as GamesObject;
use Fantasy\NFL\Fantasy\Objects\League as LeagueObject;
use Fantasy\NFL\Fantasy\Objects\Offseason as OffseasonObject;
use Fantasy\NFL\Fantasy\Objects\Players as PlayersObject;
use Fantasy\NFL\StatsAPI\Objects\Player as PlayerObject;
use Fantasy\NFL\Fantasy\Objects\Playoffs as PlayoffObject;
use Fantasy\NFL\Fantasy\Objects\Postseason as PostseasonObject;
use Fantasy\NFL\Fantasy\Objects\Rankings as RankingsObject;
use Fantasy\NFL\Fantasy\Objects\Roster as RosterObject;
use Fantasy\NFL\Fantasy\Objects\Season as SeasonObject;
use Fantasy\NFL\Fantasy\Objects\StandingsGroup as StandingsGroupObject;
use Fantasy\NFL\Fantasy\Objects\Standings as StandingsObject;
use Fantasy\NFL\Fantasy\Objects\Teams as TeamsObject;
use Fantasy\NFL\Fantasy\Objects\Team as TeamObject;
use Fantasy\NFL\Fantasy\Objects\Trades as TradesObject;
use Fantasy\NFL\Fantasy\Objects\Trade as TradeObject;
use Fantasy\NFL\Fantasy\Objects\Week as WeekObject;
use Fantasy\NFL\Fantasy\Objects\Weeks as WeeksObject;

use Fantasy\NFL\Fantasy\Models as FantasyModels;
use Fantasy\NFL\StatsAPI\Models as StatsModels;
use Illuminate\Support\Collection;

class FantasyNFLExplicit
{

    /**
     * Find a league by id
     * @param $league_id
     * @return LeagueObject
     */
    public static function find($league_id)
    {
        $league = FantasyModels\League::find($league_id);
        return LeagueObject::mapModel($league);
    }

    /**
     * Find a league by id
     * @param $league_id
     * @return LeagueObject
     */
    public static function league($league_id)
    {
        return static::find($league_id);
    }

    /**
     * Find Season
     * @param $season_number
     * @param $league_id
     * @return SeasonObject
     */
    public static function season($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return SeasonObject::mapModel($season);
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
        return WeeksObject::mapModels($season->weeks);
    }

    /**
     * Return a Week
     * @param $week_number
     * @param $season_number
     * @param $league_id
     * @return WeekObject
     */
    public static function week($week_number, $season_number, $league_id)
    {
        $week = static::getWeek($week_number, $season_number, $league_id);
        return WeekObject::mapModel($week);
    }

    /**
     * @param $league_id
     * @return Collection
     */
    public static function teams($league_id)
    {
        $teams = FantasyModels\Team::where('league_id', $league_id);
        return TeamsObject::mapModels($teams);
    }

    /**
     * Find a Team
     * @param $team_id
     * @return TeamObject
     */
    public static function team($team_id)
    {
        $team = FantasyModels\Team::find($team_id);
        return TeamObject::mapModel($team);
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
        return DivisionsObject::mapModels($divisions);
    }

    /**
     * @param $division_id
     * @return DivisionObject
     */
    public static function division($division_id)
    {
        $division = FantasyModels\Division::find($division_id);
        return DivisionObject::mapModel($division);
    }

    /**
     * @param $team_id
     * @param $season_number
     * @param $league_id
     * @return DivisionObject
     */
    public static function team_division($team_id, $season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        $divisions = $season->divisions()->pluck('id')->toArray();
        $division = FantasyModels\DivisionTeam::where('team_id', $team_id)->whereIn('division_id', $divisions)->first();
        return DivisionObject::mapModel($division);
    }

    /**
     * @param $team_id
     * @param $week_number
     * @param $season_number
     * @param $league_id
     * @return RosterObject
     */
    public static function roster($team_id, $week_number, $season_number, $league_id)
    {
        $week = static::getWeek($week_number, $season_number, $league_id);
        $roster = FantasyModels\Roster::where('team_id', $team_id)->where('week_id', $week->id)->first();
        return RosterObject::mapModel($roster);
    }

    /**
     * @return Collection
     */
    public static function players()
    {
        return PlayersObject::mapModels(StatsModels\Player::all());
    }

    /**
     * @param $player_id
     * @return PlayerObject
     */
    public static function player($player_id)
    {
        $player = StatsModels\Player::find($player_id);
        return PlayerObject::mapModel($player);
    }

    /**
     * @param $week_number
     * @param $season_number
     * @param $league_id
     * @return GameObject[]
     */
    public static function games($week_number, $season_number, $league_id)
    {
        $week = static::getWeek($week_number, $season_number, $league_id);
        return GamesObject::mapModels($week->games);
    }

    /**
     * @param $team_id
     * @param $week_number
     * @param $season_number
     * @param $league_id
     * @return GameObject
     */
    public static function game($team_id, $week_number, $season_number, $league_id)
    {
        $week = static::getWeek($week_number, $season_number, $league_id);
        $game = $week->games()->where('home_id', $team_id)->orWhere('away_id', $team_id)->first();
        return GameObject::mapModel($game);
    }

    /**
     * @param $season_number
     * @param $league_id
     * @return StandingsObject
     */
    public static function league_standings($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return StandingsObject::mapJson($season->standings);
    }

    public static function division_standings($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        $standings = $season->divisions()->pluck('standings')->toArray();
        return StandingsGroupObject::mapJsons($standings);
    }

    /**
     * @param $division_id
     * @return StandingsObject
     */
    public static function division_standing($division_id)
    {
        $division = FantasyModels\Division::find($division_id);
        return StandingsObject::mapJson($division->standings);
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
        return RankingsObject::mapModels($rankings);
    }

    /**
     * @param $season_number
     * @param $league_id
     * @return PlayoffObject
     */
    public static function playoffs($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return PlayoffObject::mapModel($season);
    }

    /**
     * @param $season_number
     * @param $league_id
     * @return PostseasonObject
     */
    public static function postseason($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return PostseasonObject::mapModel($season);
    }

    /**
     * @param $season_number
     * @param $league_id
     * @return OffseasonObject
     */
    public static function offseason($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return OffseasonObject::mapModel($season);
    }

    /**
     * @param $trade_id
     * @return TradeObject
     */
    public static function trade($trade_id)
    {
        $trade = FantasyModels\Trade::find($trade_id);
        return TradeObject::mapModel($trade);
    }

    /**
     * @param $season_number
     * @param $league_id
     * @return Collection
     */
    public static function league_trades($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return TradesObject::mapModels($season->trades);
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
        return TradesObject::mapModels($trades);
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