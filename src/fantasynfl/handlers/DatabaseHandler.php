<?php

namespace Fantasy\NFL\FantasyNFL\Handlers;

use Fantasy\NFL\FantasyNFL\Resolvers\DataResolver;
use Fantasy\NFL\Resources\UsesMapMethods;
use Fantasy\NFL\StatsAPI\Models as StatsModel;
use Fantasy\NFL\Fantasy\Models as FantasyModel;
use Fantasy\NFL\Fantasy\DTO as FantasyDTO;

class DatabaseHandler implements Handler, AccessesPlayerData, AccessesFantasyData
{

    use UsesMapMethods, DataResolver;

    public function __construct(){}

    // -----------------------------------------------------------------------------------------------------------------
    // ----------------------------------- AccessesPlayerData Implementation -------------------------------------------
    // -----------------------------------------------------------------------------------------------------------------

    public function getPlayers($ids=[])
    {
        /*$data = Player::all();
        $players = collect();
        foreach($data as $model)
        {
            $player = StatPlayer::mapModel($model);
            $players->push($player);
        }
        return $players;*/
        // TODO: Figure this method out.
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
        try {
            $league = FantasyModel\League::find($league_id);
            return FantasyDTO\League\LeagueDto::dtomap($league);
        } catch (\ErrorException $e) {
            return null;
        }
    }


    public function getLeagueActivity($league_id, $id=null)
    {
        try {
            if($id == null) {
                $activity = FantasyModel\League::find($league_id)->activity;
                return self::mapArray($activity, FantasyDTO\League\ActivityDto::class);
            } else {
                $activity = FantasyModel\Activity::find($id);
                return FantasyDTO\League\ActivityDto::dtomap($activity);
            }
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getLeagueStandings($season_id)
    {
        try{
            $standings = FantasyModel\Season::find($season_id)->standings;
            return FantasyDTO\Standings\StandingsDto::dtomap($standings);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getLeagueTrades($league_id)
    {
        try{
            $trades = FantasyModel\League::find($league_id)->trades;
            return self::mapArray($trades, FantasyDTO\Trade\TradeDto::class);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getLeagueTeams($league_id)
    {
        try{
            $teams = FantasyModel\League::find($league_id)->teams;
            return self::mapArray($teams, FantasyDTO\Team\TeamDto::class);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getSeason($season_id)
    {
        try{
            $season = FantasyModel\Season::find($season_id);
            return FantasyDTO\Season\SeasonDto::dtomap($season);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getSeasonWeeks($season_id)
    {
        try{
            $weeks = FantasyModel\Season::find($season_id)->weeks;
            return self::mapArray($weeks, FantasyDTO\Week\WeekDto::class);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getSeasonActivity($season_id)
    {
        try{
            $activity = FantasyModel\Season::find($season_id)->activity;
            return self::mapArray($activity, FantasyDTO\League\ActivityDto::class);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getSeasonTrades($season_id)
    {
        try{
            $trades = FantasyModel\Season::find($season_id)->trades;
            return self::mapArray($trades, FantasyDTO\Trade\TradeDto::class);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getWeek($week_id)
    {
        try{
            $week = FantasyModel\Week::find($week_id);
            return FantasyDTO\Week\WeekDto::dtomap($week);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getWeekGames($week_id)
    {
        try{
            $games = FantasyModel\Week::find($week_id)->games;
            return self::mapArray($games, FantasyDTO\Week\GameDto::class);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getWeekRankings($week_id)
    {
        try{
            $rankings = FantasyModel\Week::find($week_id)->rankings;
            return self::mapArray($rankings, FantasyDTO\Rankings\RankingsDto::class);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getTeam($team_id)
    {
        try{
            $team = FantasyModel\Team::find($team_id);
            return FantasyDTO\Team\TeamDto::dtomap($team);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getTeamTrades($team_id)
    {
        try {
            $trades = FantasyModel\Team::find($team_id)->trades;
            return self::mapArray($trades, FantasyDTO\Trade\TradeDto::class);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getDivisions($season_id)
    {
        try{
            $divisions = FantasyModel\Season::find($season_id)->divisions;
            return self::mapArray($divisions, FantasyDTO\League\DivisionDto::class);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getDivision($division_id)
    {
        try{
            $division = FantasyModel\Division::find($division_id);
            return FantasyDTO\League\DivisionDto::dtomap($division);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getDivisionTeams($division_id)
    {
        try{
            $teams = FantasyModel\Division::find($division_id)->teams;
            return self::mapArray($teams, FantasyDTO\Team\TeamDto::class);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getAllDivisionStandings($season_id)
    {
        try{
            $divisions = FantasyModel\Season::find($season_id)->divisions;
            $standings = $divisions->pluck('standings');
            return self::mapArray($standings, FantasyDTO\Standings\StandingsDto::class);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getDivisionStandings($division_id)
    {
        try{
            $standings = FantasyModel\Division::find($division_id)->standings;
            return FantasyDTO\Standings\StandingsDto::dtomap($standings);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getDraft($draft_id)
    {
        try{
            $draft = FantasyModel\Draft::find($draft_id);
            return FantasyDTO\Draft\DraftDto::dtomap($draft);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getDraftPicks($team_id, $draft_id)
    {
        try{
            $picks = FantasyModel\Team::find($team_id)->picks($draft_id);
            return self::mapArray($picks, FantasyDTO\Draft\DraftPickDto::class);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getRoster($team_id)
    {
        try{
            $player_id_array = FantasyModel\Team::find($team_id)->roster->pluck('player_id');
            return DataReceiver::instance()->getPlayers($player_id_array);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getLineup($team_id, $week_id)
    {
        try{
            // TODO: check this method
            $player_id_array = FantasyModel\Lineup::find($team_id)->lineup($week_id)->players()->pluck('player_id');
            return DataReceiver::instance()->getPlayers($player_id_array);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getGame($game_id)
    {
        try{
            $game = FantasyModel\Game::find($game_id);
            return FantasyDTO\Week\GameDto::dtomap($game);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getRanking($ranking_id)
    {
        try{
            $ranking = FantasyModel\Ranking::find($ranking_id);
            return FantasyDTO\Rankings\RankingsDto::dtomap($ranking);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getTrade($trade_id)
    {
        try{
            $trade = FantasyModel\Trade::find($trade_id);
            return FantasyDTO\Trade\TradeDto::dtomap($trade);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getPostseason($type, $season_id)
    {
        try{
            // TODO: Implement getPostseason() method.
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getUser($user_id)
    {
        try{
            $user = FantasyModel\User::find($user_id);
            return FantasyDTO\League\UserDto::dtomap($user);
        } catch (\ErrorException $e) {
            return null;
        }
    }

}