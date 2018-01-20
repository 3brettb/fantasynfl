<?php

namespace Fantasy\NFL\FantasyNFL\Handlers;

use Fantasy\NFL\API\NflData;
use Fantasy\NFL\Enums\StatType;

class ApiHandler implements Handler, AccessesPlayerData, AccessesFantasyData
{

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

        return NflData::getPlayers($ids);
    }

    public function getAllPlayers()
    {
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
    }

    public function getPlayer($player_id)
    {
        return $this->getPlayerDetails($player_id);
    }

    public function getPlayerDetails($player_id)
    {
        $dto = NflData::getPlayer($player_id);
        dd($dto);
        // TODO: Complete the Map of Dto, Possibly change all maps to mapping DTO's
        return Player::mapJson($dto);
    }

    public function getPlayerSeasonStats($player_id, $position, $season = null)
    {
        $dto = static::getSeasonStats($season, $position);
        // TODO: Implement getPlayerSeasonStats() method.
        dd($dto);
    }

    public function getPlayerSeasonProjectedStats($player_id, $position, $season = null)
    {
        $dto = static::getSeasonProjectedStats($season, $position);
        // TODO: Implement getPlayerSeasonProjectedStats() method.
        dd($dto);
    }

    public function getPlayerWeekStats($player_id, $position, $season = null)
    {
        $dto = static::getWeekStats($season, $position);
        // TODO: Implement getPlayerWeekStats() method.
        dd($dto);
    }

    public function getPlayerWeekProjectedStats($player_id, $position, $season = null)
    {
        $dto = static::getWeekProjectedStats($season, $position);
        // TODO: Implement getPlayerWeekProjectedStats() method.
        dd($dto);
    }

    public function getPlayerAdvancedStats($player_id, $position, $week = null, $season = null)
    {
        $dto = static::getAdvancedStats($week, $season, $position);
        // TODO: Implement getPlayerAdvancedStats() method.
        dd($dto);
    }

    public function getResearchInfo($week = null, $player_id = null)
    {
        $dto = NflData::getResearch($week);
        // TODO: Implement getResearchInfo() method.
        dd($dto);
    }

    public function getWeekRanks($week = null, $position = null)
    {
        $dto = NflData::getWeekRanks($week, $position);
        // TODO: Implement getWeekRanks() method.
        dd($dto);
    }

    public function getNews($player_id = null)
    {
        $dto = NflData::getNews();
        // TODO: Implement getNews() method.
        dd($dto);
    }

    public function getScoringLeaders($week = null, $position = null)
    {
        $dto = NflData::getScoringLeaders($week, $position);
        // TODO: Implement getScoringLeaders() method.
        dd($dto);
    }

    public function getSeasonStats($season = null, $position = null)
    {
        $dto = NflData::getStats(StatType::Season, $position, $season, null);
        // TODO: Implement getSeasonStats() method.
        dd($dto);
    }

    public function getSeasonProjectedStats($season = null, $position = null)
    {
        $dto = NflData::getStats(StatType::SeasonProjected, $position, $season, null);
        // TODO: Implement getSeasonProjectedStats() method.
        dd($dto);
    }

    public function getWeekStats($week = null, $position = null)
    {
        $dto = NflData::getStats(StatType::Week, $position, null, $week);
        // TODO: Implement getWeekStats() method.
        dd($dto);
    }

    public function getWeekProjectedStats($week = null, $position = null)
    {
        $dto = NflData::getStats(StatType::WeekProjected, $position, null, $week);
        // TODO: Implement getWeekProjectedStats() method.
        dd($dto);
    }

    public function getAdvancedStats($week = null, $season = null, $position = null)
    {
        $dto = NflData::getAdvancedStats($position, $week, $season);
        // TODO: Implement getAdvancedStats() method.
        dd($dto);
    }

    public function getGameStats($gameId)
    {
        $dto = NflData::getGameStats($gameId);
        // TODO: Implement getGameStats() method.
        dd($dto);
    }

    public function getStatsConfig()
    {
        $dto = NflData::getStatsConfig();
        // TODO: implement getStatsConfig() method.
        dd($dto);
    }

    // -----------------------------------------------------------------------------------------------------------------
    // ----------------------------------- AccessesFantasyData Implementation ------------------------------------------
    // -----------------------------------------------------------------------------------------------------------------

    // These methods all defer to the handler and are therefore condensed/minimized
    public function getLeague($league_id){return $this->DATABASE_HANDLER->getLeague($league_id);}
    public function getLeagueActivity($league_id){return $this->DATABASE_HANDLER->getLeagueActivity($league_id);}
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