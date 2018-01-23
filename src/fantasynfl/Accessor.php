<?php

namespace Fantasy\NFL\FantasyNFL;

use Fantasy\NFL\Fantasy\DTO as FantasyDTO;

use Fantasy\NFL\Fantasy\Models as FantasyModels;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

class Accessor
{

    // TODO: Possibly - check each single id lookups to see if an id is passed or a model. If model, map. This aviods uneccessary lookups

    /**
     * Find a league by id
     * @param $league_id
     * @return FantasyDTO\League\LeagueDto
     */
    public static function find($league_id)
    {
        return DataReceiver::instance()->getLeague($league_id);
    }

    /**
     * Find a league by id
     * @param $league_id
     * @return FantasyDTO\League\LeagueDto
     */
    public static function league($league_id)
    {
        return static::find($league_id);
    }

    /**
     * @param $league_id
     * @return FantasyDTO\League\ActivityDto
     */
    public static function activity($league_id)
    {
        return DataReceiver::instance()->getLeagueActivity($league_id);
    }

    /**
     * Find Season
     * @param $season_number
     * @param $league_id
     * @return FantasyDTO\Season\SeasonDto
     */
    public static function season($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return DataReceiver::instance()->getSeason($season->id);
    }

    /**
     * Get Season Week collection
     * @param $season_number
     * @param $league_id
     * @return FantasyDTO\Week\WeekDto[]
     */
    public static function weeks($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return DataReceiver::instance()->getSeasonWeeks($season->id);
    }

    /**
     * Return a Week
     * @param $week_number
     * @param $season_number
     * @param $league_id
     * @return FantasyDTO\Week\WeekDto
     */
    public static function week($week_number, $season_number, $league_id)
    {
        $week = static::getWeek($week_number, $season_number, $league_id);
        return DataReceiver::instance()->getWeek($week->id);
    }

    /**
     * @param $league_id
     * @return FantasyDTO\League\TeamsDto
     */
    public static function teams($league_id)
    {
        return DataReceiver::instance()->getLeagueTeams($league_id);
    }

    /**
     * Find a Team
     * @param $team_id
     * @return FantasyDTO\Team\TeamDto
     */
    public static function team($team_id)
    {
        return DataReceiver::instance()->getTeam($team_id);
    }

    /**
     * Return Division Collection
     * @param $season_number
     * @param $league_id
     * @return FantasyDTO\League\DivisionDto[]
     */
    public static function divisions($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return DataReceiver::instance()->getDivisions($season->id);
    }

    /**
     * @param $division_id
     * @return FantasyDTO\League\DivisionDto
     */
    public static function division($division_id)
    {
        return DataReceiver::instance()->getDivision($division_id);
    }

    /**
     * @param $team_id
     * @param $season_number
     * @param $league_id
     * @return FantasyDTO\League\DivisionDto
     */
    public static function team_division($team_id, $season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        $divisions = $season->divisions()->pluck('id')->toArray();
        $division_team = FantasyModels\DivisionTeam::where('team_id', $team_id)->whereIn('division_id', $divisions)->first();
        return self::division($division_team->division_id);
    }

    /**
     * @param $year
     * @param $league_id
     * @return FantasyDTO\Draft\DraftDto
     */
    public static function draft($year, $league_id)
    {
        $season = static::getSeason($year, $league_id);
        return DataReceiver::instance()->getDraft($season->draft->id);
    }

    /**
     * @param $team_id
     * @param $year
     * @param $league_id
     * @return FantasyDTO\Draft\DraftPickDto[]
     */
    public static function draft_picks($team_id, $year, $league_id)
    {
        $season = static::getSeason($year, $league_id);
        return DataReceiver::instance()->getDraftPicks($team_id, $season->draft->id);
    }

    /**
     * @param $team_id
     * @param $week_number
     * @param $season_number
     * @param $league_id
     * @return FantasyDTO\Team\LineupDto
     */
    public static function lineup($team_id, $week_number, $season_number, $league_id)
    {
        $week = static::getWeek($week_number, $season_number, $league_id);
        return DataReceiver::instance()->getLineup($team_id, $week->id);
    }

    /**
     * @param $team_id
     * @return FantasyDTO\League\PlayerDto[]
     */
    public static function roster($team_id)
    {
        return DataReceiver::instance()->getRoster($team_id);
    }

    /**
     * @return array
     */
    public static function players()
    {
        return DataReceiver::instance()->getPlayers();
    }

    /**
     * @param $player_id
     * @return mixed
     */
    public static function player($player_id)
    {
        return DataReceiver::instance()->getPlayer($player_id);
    }

    /**
     * @param $week_number
     * @param $season_number
     * @param $league_id
     * @return FantasyDTO\Week\GameDto[]
     */
    public static function games($week_number, $season_number, $league_id)
    {
        $week = static::getWeek($week_number, $season_number, $league_id);
        return DataReceiver::instance()->getWeekGames($week->id);
    }

    /**
     * @param $team_id
     * @param $week_number
     * @param $season_number
     * @param $league_id
     * @return FantasyDTO\Week\GameDto
     */
    public static function game($team_id, $week_number, $season_number, $league_id)
    {
        $week = static::getWeek($week_number, $season_number, $league_id);
        $game = $week->games()->where('home_id', $team_id)->orWhere('away_id', $team_id)->first();
        return DataReceiver::instance()->getGame($game->id);
    }

    /**
     * @param $season_number
     * @param $league_id
     * @return FantasyDTO\Standings\StandingsDto
     */
    public static function league_standings($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return DataReceiver::instance()->getLeagueStandings($season->id);
    }

    /**
     * @param  $season_number
     * @param $league_id
     * @return FantasyDTO\Standings\StandingsDto
     */
    public static function division_standings($season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return DataReceiver::instance()->getAllDivisionStandings($season->id);
    }

    /**
     * @param $division_id
     * @return FantasyDTO\Standings\StandingDto
     */
    public static function division_standing($division_id)
    {
        $division = FantasyModels\Division::find($division_id);
        return DataReceiver::instance()->getDivisionStandings($division->id);
    }

    /**
     * @param $type
     * @param $week_number
     * @param $season_number
     * @param $league_id
     * @return FantasyDTO\Rankings\RankingsDto
     */
    public static function rankings($type, $week_number, $season_number, $league_id)
    {
        $week = static::getWeek($week_number, $season_number, $league_id);
        $rankings = $week->rankings()->where('type', $type)->get();
        return DataReceiver::instance()->getRanking($rankings->id);
    }

    /**
     * @param $type
     * @param $season_number
     * @param $league_id
     * @return FantasyDTO\Season\PostseasonDto
     */
    public static function postseason($type, $season_number, $league_id)
    {
        $season = static::getSeason($season_number, $league_id);
        return DataReceiver::instance()->getPostseason($type, $season->id);
    }

    /**
     * @param $trade_id
     * @return FantasyDTO\Trade\TradeDto
     */
    public static function trade($trade_id)
    {
        return DataReceiver::instance()->getTrade($trade_id);
    }

    /**
     * @param $league_id
     * @return FantasyDTO\Trade\TradeDto[]
     */
    public static function league_trades($league_id)
    {
        return DataReceiver::instance()->getLeagueTrades($league_id);
    }

    /**
     * @param $team_id
     * @return FantasyDTO\Trade\TradeDto[]
     */
    public static function team_trades($team_id)
    {
        return DataReceiver::instance()->getTeamTrades($team_id);
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