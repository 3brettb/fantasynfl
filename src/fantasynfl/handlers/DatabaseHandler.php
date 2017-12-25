<?php

namespace Fantasy\NFL\FantasyNFL\Handlers;

use Fantasy\NFL\Resources\UsesMapMethods;
use Fantasy\NFL\StatsAPI\Models as StatsModel;
use Fantasy\NFL\Fantasy\Models as FantasyModel;
use Fantasy\NFL\Fantasy\DTO as FantasyDTO;

class DatabaseHandler implements Handler, AccessesPlayerData, AccessesFantasyData
{

    use UsesMapMethods;

    public function __construct(){}

    // -----------------------------------------------------------------------------------------------------------------
    // ----------------------------------- AccessesPlayerData Implementation -------------------------------------------
    // -----------------------------------------------------------------------------------------------------------------

    public function getPlayers()
    {
        $data = Player::all();
        $players = collect();
        foreach($data as $model)
        {
            $player = StatPlayer::mapModel($model);
            $players->push($player);
        }
        return $players;
    }

    public function getPlayer($player_id)
    {
        // TODO: Implement getPlayer() method.
    }

    public function getPlayerDetails($player_id)
    {
        // TODO: Implement getPlayerDetails() method.
    }

    public function getPlayerSeasonStats($player_id, $position, $season = null)
    {
        // TODO: Implement getPlayerSeasonStats() method.
    }

    public function getPlayerSeasonProjectedStats($player_id, $position, $season = null)
    {
        // TODO: Implement getPlayerSeasonProjectedStats() method.
    }

    public function getPlayerWeekStats($player_id, $position, $season = null)
    {
        // TODO: Implement getPlayerWeekStats() method.
    }

    public function getPlayerWeekProjectedStats($player_id, $position, $season = null)
    {
        // TODO: Implement getPlayerWeekProjectedStats() method.
    }

    public function getPlayerAdvancedStats($player_id, $position, $week = null, $season = null)
    {
        // TODO: Implement getPlayerAdvancedStats() method.
    }

    public function getResearchInfo($week = null, $player_id = null)
    {
        // TODO: Implement getResearchInfo() method.
    }

    public function getWeekRanks($week = null, $position = null)
    {
        // TODO: Implement getWeekRanks() method.
    }

    public function getNews($player_id = null)
    {
        // TODO: Implement getNews() method.
    }

    public function getScoringLeaders($week = null, $position = null)
    {
        // TODO: Implement getScoringLeaders() method.
    }

    public function getSeasonStats($season = null, $position = null)
    {
        // TODO: Implement getSeasonStats() method.
    }

    public function getSeasonProjectedStats($season = null, $position = null)
    {
        // TODO: Implement getSeasonProjectedStats() method.
    }

    public function getWeekStats($week = null, $position = null)
    {
        // TODO: Implement getWeekStats() method.
    }

    public function getWeekProjectedStats($week = null, $position = null)
    {
        // TODO: Implement getWeekProjectedStats() method.
    }

    public function getAdvancedStats($week = null, $season = null, $position = null)
    {
        // TODO: Implement getAdvancedStats() method.
    }

    public function getGameStats($gameId)
    {
        // TODO: Implement getGameStats() method.
    }

    public function getStatsConfig()
    {
        // TODO: Implement getStatsConfig() method.
    }

    // -----------------------------------------------------------------------------------------------------------------
    // ----------------------------------- AccessesFantasyData Implementation ------------------------------------------
    // -----------------------------------------------------------------------------------------------------------------

    public function getLeague($league_id)
    {
        $league = FantasyModel\League::find($league_id);
        return FantasyDTO\League\LeagueDto::dtomap($league);
    }

    public function getLeagueActivity($league_id)
    {
        $activity = FantasyModel\League::find($league_id)->activity;
        return self::mapArray($activity, FantasyDTO\League\ActivityDto::class);
    }

    public function getLeagueStandings($season_id)
    {
        $standings = FantasyModel\Season::find($season_id)->standings;
        return FantasyDTO\Standings\StandingsDto::dtomap($standings);
    }

    public function getLeagueTrades($league_id)
    {
        $trades = FantasyModel\League::find($league_id)->trades;
        return self::mapArray($trades, FantasyDTO\Trade\TradeDto::class);
    }

    public function getLeagueTeams($league_id)
    {
        $teams = FantasyModel\League::find($league_id)->teams;
        return self::mapArray($teams, FantasyDTO\Team\TeamDto::class);
    }

    public function getSeason($season_id)
    {
        $season = FantasyModel\Season::find($season_id);
        return FantasyDTO\Season\SeasonDto::dtomap($season);
    }

    public function getSeasonWeeks($season_id)
    {
        $weeks = FantasyModel\Season::find($season_id)->weeks;
        return self::mapArray($weeks, FantasyDTO\Week\WeekDto::class);
    }

    public function getSeasonActivity($season_id)
    {
        $activity = FantasyModel\Season::find($season_id)->activity;
        return self::mapArray($activity, FantasyDTO\League\ActivityDto::class);
    }

    public function getSeasonTrades($season_id)
    {
        $trades = FantasyModel\Season::find($season_id)->trades;
        return self::mapArray($trades, FantasyDTO\Trade\TradeDto::class);
    }

    public function getWeek($week_id)
    {
        $week = FantasyModel\Week::find($week_id);
        return FantasyDTO\Week\WeekDto::dtomap($week);
    }

    public function getWeekGames($week_id)
    {
        $games = FantasyModel\Week::find($week_id)->games;
        return self::mapArray($games, FantasyDTO\Week\GameDto::class);
    }

    public function getWeekRankings($week_id)
    {
        $rankings = FantasyModel\Week::find($week_id)->rankings;
        return self::mapArray($rankings, FantasyDTO\Rankings\RankingsDto::class);
    }

    public function getTeam($team_id)
    {
        $team = FantasyModel\Team::find($team_id);
        return FantasyDTO\Team\TeamDto::dtomap($team);
    }

    public function getTeamTrades($team_id)
    {
        $trades = FantasyModel\Team::find($team_id)->trades;
        return self::mapArray($trades, FantasyDTO\Trade\TradeDto::class);
    }

    public function getDivisions($season_id)
    {
        $divisions = FantasyModel\Season::find($season_id)->divisions;
        return self::mapArray($divisions, FantasyDTO\League\DivisionDto::class);
    }

    public function getDivision($division_id)
    {
        $division = FantasyModel\Division::find($division_id);
        return FantasyDTO\League\DivisionDto::dtomap($division);
    }

    public function getDivisionTeams($division_id)
    {
        $teams = FantasyModel\Division::find($division_id)->teams;
        return self::mapArray($teams, FantasyDTO\Team\TeamDto::class);
    }

    public function getAllDivisionStandings($season_id)
    {
        $divisions = FantasyModel\Season::find($season_id)->divisions;
        $standings = $divisions->pluck('standings');
        return self::mapArray($standings, FantasyDTO\Standings\StandingsDto::class);
    }

    public function getDivisionStandings($division_id)
    {
        $standings = FantasyModel\Division::find($division_id)->standings;
        return FantasyDTO\Standings\StandingsDto::dtomap($standings);
    }

    public function getDraft($draft_id)
    {
        $draft = FantasyModel\Draft::find($draft_id);
        return FantasyDTO\Draft\DraftDto::dtomap($draft);
    }

    public function getDraftPicks($team_id, $draft_id)
    {
        $picks = FantasyModel\Team::find($team_id)->picks($draft_id);
        return self::mapArray($picks, FantasyDTO\Draft\DraftPickDto::class);
    }

    public function getRoster($team_id)
    {
        // TODO: Implement getRoster() method.
    }

    public function getLineup($team_id, $week_id)
    {
        // TODO: Implement getLineup() method.
    }

    public function getGame($game_id)
    {
        $game = FantasyModel\Game::find($game_id);
        return FantasyDTO\Week\GameDto::dtomap($game);
    }

    public function getRanking($ranking_id)
    {
        $ranking = FantasyModel\Ranking::find($ranking_id);
        return FantasyDTO\Rankings\RankingsDto::dtomap($ranking);
    }

    public function getTrade($trade_id)
    {
        $trade = FantasyModel\Trade::find($trade_id);
        return FantasyDTO\Trade\TradeDto::dtomap($trade);
    }

    public function getPostseason($type, $season_id)
    {
        // TODO: Implement getPostseason() method.
    }

    public function getUser($user_id)
    {
        $user = FantasyModel\User::find($user_id);
        return FantasyDTO\League\UserDto::dtomap($user);
    }

}