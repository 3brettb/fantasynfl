<?php

namespace Fantasy\NFL\FantasyNFL\Handlers;

use Fantasy\NFL\API\NflData;
use Fantasy\NFL\Enums\StatType;
use Fantasy\NFL\FantasyNFL\Resolvers\DataResolver;

class ApiHandler implements Handler, AccessesPlayerData, AccessesFantasyData
{

    use DataResolver;

    private $DATABASE_HANDLER;

    public function __construct(){
        $this->DATABASE_HANDLER = new DatabaseHandler();
    }

    // -----------------------------------------------------------------------------------------------------------------
    // ----------------------------------- AccessesPlayerData Implementation -------------------------------------------
    // -----------------------------------------------------------------------------------------------------------------

    public function getPlayers($ids=[])
    {
        if(sizeof($ids) == 0)
        {
            return self::getAllPlayers();
        }

        try{
            return NflData::getPlayers($ids);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getAllPlayers()
    {
        try{
            $data = NflData::getAllPlayers();
            $players = collect();
            foreach($data as $group)
            {
                foreach($group->players as $json)
                {
                    $player = Player::mapJson($json);
                    $players->push($player);
                }
            }
            return $players;
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getPlayer($player_id)
    {
        try{
            return $this->getPlayerDetails($player_id);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getPlayerDetails($player_id)
    {
        try{
            $dto = NflData::getPlayer($player_id);
            dd($dto);
            // TODO: Complete the Map of Dto, Possibly change all maps to mapping DTO's
            return Player::mapJson($dto);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getPlayerSeasonStats($player_id, $position, $season = null)
    {
        try{
            $dto = static::getSeasonStats($season, $position);
            // TODO: Implement getPlayerSeasonStats() method.
            dd($dto);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getPlayerSeasonProjectedStats($player_id, $position, $season = null)
    {
        try{
            $dto = static::getSeasonProjectedStats($season, $position);
            // TODO: Implement getPlayerSeasonProjectedStats() method.
            dd($dto);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getPlayerWeekStats($player_id, $position, $season = null)
    {
        try{
            $dto = static::getWeekStats($season, $position);
            // TODO: Implement getPlayerWeekStats() method.
            dd($dto);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getPlayerWeekProjectedStats($player_id, $position, $season = null)
    {
        try{
            $dto = static::getWeekProjectedStats($season, $position);
            // TODO: Implement getPlayerWeekProjectedStats() method.
            dd($dto);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getPlayerAdvancedStats($player_id, $position, $week = null, $season = null)
    {
        try{
            $dto = static::getAdvancedStats($week, $season, $position);
            // TODO: Implement getPlayerAdvancedStats() method.
            dd($dto);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getResearchInfo($week = null, $player_id = null)
    {
        try{
            $dto = NflData::getResearch($week);
            // TODO: Implement getResearchInfo() method.
            dd($dto);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getWeekRanks($week = null, $position = null)
    {
        try{
            $dto = NflData::getWeekRanks($week, $position);
            // TODO: Implement getWeekRanks() method.
            dd($dto);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getNews($player_id = null)
    {
        try{
            $dto = NflData::getNews();
            // TODO: Implement getNews() method.
            dd($dto);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getScoringLeaders($week = null, $position = null)
    {
        try{
            $dto = NflData::getScoringLeaders($week, $position);
            // TODO: Implement getScoringLeaders() method.
            dd($dto);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getSeasonStats($season = null, $position = null)
    {
        try{
            $dto = NflData::getStats(StatType::Season, $position, $season, null);
            // TODO: Implement getSeasonStats() method.
            dd($dto);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getSeasonProjectedStats($season = null, $position = null)
    {
        try{
            $dto = NflData::getStats(StatType::SeasonProjected, $position, $season, null);
            // TODO: Implement getSeasonProjectedStats() method.
            dd($dto);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getWeekStats($week = null, $position = null)
    {
        try{
            $dto = NflData::getStats(StatType::Week, $position, null, $week);
            // TODO: Implement getWeekStats() method.
            dd($dto);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getWeekProjectedStats($week = null, $position = null)
    {
        try{
            $dto = NflData::getStats(StatType::WeekProjected, $position, null, $week);
            // TODO: Implement getWeekProjectedStats() method.
            dd($dto);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getAdvancedStats($week = null, $season = null, $position = null)
    {
        try{
            $dto = NflData::getAdvancedStats($position, $week, $season);
            // TODO: Implement getAdvancedStats() method.
            dd($dto);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getGameStats($gameId)
    {
        try{
            $dto = NflData::getGameStats($gameId);
            // TODO: Implement getGameStats() method.
            dd($dto);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function getStatsConfig()
    {
        try{
            $dto = NflData::getStatsConfig();
            // TODO: implement getStatsConfig() method.
            dd($dto);
        } catch (\ErrorException $e) {
            return null;
        }
    }

    // -----------------------------------------------------------------------------------------------------------------
    // ----------------------------------- AccessesFantasyData Implementation ------------------------------------------
    // -----------------------------------------------------------------------------------------------------------------

    // These methods all defer to the handler and are therefore condensed/minimized
    public function getLeague($league_id){return $this->DATABASE_HANDLER->getLeague($league_id);}
    public function getLeagueActivity($league_id, $id=null){return $this->DATABASE_HANDLER->getLeagueActivity($league_id, $id);}
    public function getLeagueStandings($season_id){return $this->DATABASE_HANDLER->getLeagueStandings($season_id);}
    public function getLeagueTrades($league_id){return $this->DATABASE_HANDLER->getLeagueTrades($league_id);}
    public function getLeagueTeams($league_id){return $this->DATABASE_HANDLER->getLeagueTeams($league_id);}
    public function getSeason($season_id){return $this->DATABASE_HANDLER->getSeason($season_id);}
    public function getSeasonWeeks($season_id){return $this->DATABASE_HANDLER->getSeasonWeeks($season_id);}
    public function getSeasonActivity($season_id){return $this->DATABASE_HANDLER->getSeasonActivity($season_id);}
    public function getSeasonTrades($season_id){return $this->DATABASE_HANDLER->getSeasonTrades($season_id);}
    public function getWeek($week_id){return $this->DATABASE_HANDLER->getWeek($week_id);}
    public function getWeekGames($week_id){return $this->DATABASE_HANDLER->getWeekGames($week_id);}
    public function getWeekRankings($week_id){return $this->DATABASE_HANDLER->getWeekRankings($week_id);}
    public function getTeam($team_id){return $this->DATABASE_HANDLER->getTeam($team_id);}
    public function getTeamTrades($team_id){return $this->DATABASE_HANDLER->getTeamTrades($team_id);}
    public function getDivisions($season_id){return $this->DATABASE_HANDLER->getDivisions($season_id);}
    public function getDivision($division_id){return $this->DATABASE_HANDLER->getDivision($division_id);}
    public function getDivisionTeams($division_id){return $this->DATABASE_HANDLER->getDivisionTeams($division_id);}
    public function getAllDivisionStandings($season_id){return $this->DATABASE_HANDLER->getAllDivisionStandings($season_id);}
    public function getDivisionStandings($division_id){return $this->DATABASE_HANDLER->getDivisionStandings($division_id);}
    public function getDraft($draft_id){return $this->DATABASE_HANDLER->getDraft($draft_id);}
    public function getDraftPicks($team_id, $draft_id){return $this->DATABASE_HANDLER->getDraftPicks($team_id, $draft_id);}
    public function getRoster($team_id){return $this->DATABASE_HANDLER->getRoster($team_id);}
    public function getLineup($team_id, $week_id){return $this->DATABASE_HANDLER->getLineup($team_id, $week_id);}
    public function getGame($game_id){return $this->DATABASE_HANDLER->getGame($game_id);}
    public function getRanking($ranking_id){return $this->DATABASE_HANDLER->getRanking($ranking_id);}
    public function getTrade($trade_id){return $this->DATABASE_HANDLER->getTrade($trade_id);}
    public function getPostseason($type, $season_id){return $this->DATABASE_HANDLER->getPostseason($type, $season_id);}
    public function getUser($user_id){return $this->DATABASE_HANDLER->getUser($user_id);}

}