<?php

namespace Fantasy\NFL\FantasyNFL\Handlers;

use Fantasy\NFL\Exceptions\NotLoggedInException;
use Illuminate\Support\Facades\Auth;

class DataReceiver implements AccessesPlayerData, AccessesFantasyData
{

    private $handler;

    private static $instance = null;

    private function __construct()
    {
        $type = config('fantasynfl.api.source');
        switch(strtoupper($type))
        {
            case "DATABASE":
                $this->handler = new DatabaseHandler();
                break;
            case "API":
            default:
                $this->handler = new ApiHandler();
                break;
        }
    }

    /**
     * @return DataReceiver
     */
    public static function instance()
    {
        // Resolve Instance
        if(static::$instance == null)
        {
            static::$instance = new DataReceiver();
        }

        // Verify logged in
        if(Auth::check()) {
            // Return instance
            return static::$instance;
        } else {
            throw new NotLoggedInException("Session Expired");
        }
    }

    // -----------------------------------------------------------------------------------------------------------------
    // ----------------------------------- AccessesPlayerData Implementation -------------------------------------------
    // -----------------------------------------------------------------------------------------------------------------

    // These methods all defer to the handler and are therefore condensed/minimized
    public function getPlayers($ids=[]){return $this->handler->getPlayers($ids);}
    public function getPlayer($player_id){return $this->handler->getPlayer($player_id);}
    public function getPlayerDetails($player_id){return $this->handler->getPlayerDetails($player_id);}
    public function getPlayerSeasonStats($player_id, $position, $season = null){return $this->handler->getPlayerSeasonStats($player_id, $position, $season);}
    public function getPlayerSeasonProjectedStats($player_id, $position, $season = null){return $this->handler->getPlayerSeasonProjectedStats($player_id, $position, $season);}
    public function getPlayerWeekStats($player_id, $position, $season = null){return $this->handler->getPlayerWeekStats($player_id, $position, $season);}
    public function getPlayerWeekProjectedStats($player_id, $position, $season = null){return $this->handler->getPlayerWeekProjectedStats($player_id, $position, $season);}
    public function getPlayerAdvancedStats($player_id, $position, $week = null, $season = null){return $this->handler->getPlayerAdvancedStats($player_id, $position, $week, $season);}
    public function getResearchInfo($week = null, $player_id = null){return $this->handler->getResearchInfo($week, $player_id);}
    public function getWeekRanks($week = null, $position = null){return $this->handler->getWeekRanks($week, $position);}
    public function getNews($player_id = null){return $this->handler->getNews($player_id);}
    public function getScoringLeaders($week = null, $position = null){return $this->handler->getScoringLeaders($week, $position);}
    public function getSeasonStats($season = null, $position = null){return $this->handler->getSeasonStats($season, $position);}
    public function getSeasonProjectedStats($season = null, $position = null){return $this->handler->getSeasonProjectedStats($season, $position);}
    public function getWeekStats($week = null, $position = null){return $this->handler->getWeekStats($week, $position);}
    public function getWeekProjectedStats($week = null, $position = null){return $this->handler->getWeekProjectedStats($week, $position);}
    public function getAdvancedStats($week = null, $season = null, $position = null){return $this->handler->getAdvancedStats($week, $season, $position);}
    public function getGameStats($gameId){return $this->handler->getGameStats($gameId);}
    public function getStatsConfig(){return $this->handler->getStatsConfig();}

    // -----------------------------------------------------------------------------------------------------------------
    // ----------------------------------- AccessesFantasyData Implementation ------------------------------------------
    // -----------------------------------------------------------------------------------------------------------------

    // These methods all defer to the handler and are therefore condensed/minimized
    public function getLeague($league_id){return $this->handler->getLeague($league_id);}
    public function getLeagueActivity($league_id, $id=null){return $this->handler->getLeagueActivity($league_id, $id);}
    public function getLeagueStandings($season_id){return $this->handler->getLeagueStandings($season_id);}
    public function getLeagueTrades($league_id){return $this->handler->getLeagueTrades($league_id);}
    public function getLeagueTeams($league_id){return $this->handler->getLeagueTeams($league_id);}
    public function getSeason($season_id){return $this->handler->getSeason($season_id);}
    public function getSeasonWeeks($season_id){return $this->handler->getSeasonWeeks($season_id);}
    public function getSeasonActivity($season_id){return $this->handler->getSeasonActivity($season_id);}
    public function getSeasonTrades($season_id){return $this->handler->getSeasonTrades($season_id);}
    public function getWeek($week_id){return $this->handler->getWeek($week_id);}
    public function getWeekGames($week_id){return $this->handler->getWeekGames($week_id);}
    public function getWeekRankings($week_id){return $this->handler->getWeekRankings($week_id);}
    public function getTeam($team_id){return $this->handler->getTeam($team_id);}
    public function getTeamTrades($team_id){return $this->handler->getTeamTrades($team_id);}
    public function getDivisions($season_id){return $this->handler->getDivisions($season_id);}
    public function getDivision($division_id){return $this->handler->getDivision($division_id);}
    public function getDivisionTeams($division_id){return $this->handler->getDivisionTeams($division_id);}
    public function getAllDivisionStandings($season_id){return $this->handler->getAllDivisionStandings($season_id);}
    public function getDivisionStandings($division_id){return $this->handler->getDivisionStandings($division_id);}
    public function getDraft($draft_id){return $this->handler->getDraft($draft_id);}
    public function getDraftPicks($team_id, $draft_id){return $this->handler->getDraftPicks($team_id, $draft_id);}
    public function getRoster($team_id){return $this->handler->getRoster($team_id);}
    public function getLineup($team_id, $week_id){return $this->handler->getLineup($team_id, $week_id);}
    public function getGame($game_id){return $this->handler->getGame($game_id);}
    public function getRanking($ranking_id){return $this->handler->getRanking($ranking_id);}
    public function getTrade($trade_id){return $this->handler->getTrade($trade_id);}
    public function getPostseason($type, $season_id){return $this->handler->getPostseason($type, $season_id);}
    public function getUser($user_id){return $this->handler->getUser($user_id);}

}