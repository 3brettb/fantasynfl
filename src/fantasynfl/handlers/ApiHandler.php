<?php

namespace Fantasy\NFL\FantasyNFL\Handlers;

use Fantasy\NFL\API\DTO\PlayerDetails\PlayerDto;
use Fantasy\NFL\API\NflData;
use Fantasy\NFL\StatsAPI\Objects\StatPlayer as Player;

class ApiHandler implements Handler, AccessesPlayerData, AccessesFantasyData
{

    private $DATABASE_HANDLER;

    public function __construct(){
        $this->DATABASE_HANDLER = new DatabaseHandler();
    }

    // -----------------------------------------------------------------------------------------------------------------
    // ----------------------------------- AccessesPlayerData Implementation -------------------------------------------
    // -----------------------------------------------------------------------------------------------------------------

    public function getPlayers()
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
        $json = NflData::getPlayer($player_id);
        $data = PlayerDto::dtomap($json->players[0]);
        dd($data);
        return Player::mapJson($json);
    }

    public function getPlayerSeasonStats($player_id, $season = null)
    {
        // TODO: Implement getPlayerSeasonStats() method.
    }

    public function getPlayerSeasonProjectedStats($player_id, $season = null)
    {
        // TODO: Implement getPlayerSeasonProjectedStats() method.
    }

    public function getPlayerWeekStats($player_id, $season = null)
    {
        // TODO: Implement getPlayerWeekStats() method.
    }

    public function getPlayerWeekProjectedStats($player_id, $season = null)
    {
        // TODO: Implement getPlayerWeekProjectedStats() method.
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

    public function getAdvancedStats($week = null, $position = null)
    {
        // TODO: Implement getAdvancedStats() method.
    }

    public function getGameStats($gameId)
    {
        // TODO: Implement getGameStats() method.
    }

    // -----------------------------------------------------------------------------------------------------------------
    // ----------------------------------- AccessesFantasyData Implementation ------------------------------------------
    // -----------------------------------------------------------------------------------------------------------------

    // These methods all defer to the handler and are therefore condensed/minimized
    public function getLeague($league_id){return $this->DATABASE_HANDLER->getLeague($league_id);}
    public function getLeagueActivity($league_id){return $this->DATABASE_HANDLER->getLeagueActivity($league_id);}
    public function getLeagueStandings($season_id){return $this->DATABASE_HANDLER->getLeagueStandings($season_id);}
    public function getLeagueTrades($league_id){return $this->DATABASE_HANDLER->getLeagueTrades($league_id);}
    public function getSeason($season_id){return $this->DATABASE_HANDLER->getSeason($season_id);}
    public function getSeasonWeeks($season_id){return $this->DATABASE_HANDLER->getSeasonWeeks($season_id);}
    public function getSeasonActivity($season_id){return $this->DATABASE_HANDLER->getSeasonActivity($season_id);}
    public function getWeek($week_id){return $this->DATABASE_HANDLER->getWeek($week_id);}
    public function getWeekGames($week_id){return $this->DATABASE_HANDLER->getWeekGames($week_id);}
    public function getWeekRankings($week_id){return $this->DATABASE_HANDLER->getWeekRankings($week_id);}
    public function getTeam($team_id){return $this->DATABASE_HANDLER->getTeam($team_id);}
    public function getDivisions($league_id){return $this->DATABASE_HANDLER->getDivisions($league_id);}
    public function getDivision($division_id){return $this->DATABASE_HANDLER->getDivision($division_id);}
    public function getDivisionStandings($division_id){return $this->DATABASE_HANDLER->getDivisionStandings($division_id);}
    public function getDraft($draft_id){return $this->DATABASE_HANDLER->getDraft($draft_id);}
    public function getDraftPicks($draft_id){return $this->DATABASE_HANDLER->getDraftPicks($draft_id);}
    public function getRoster($roster_id){return $this->DATABASE_HANDLER->getRoster($roster_id);}
    public function getLineup($team_id, $week_id){return $this->DATABASE_HANDLER->getLineup($team_id, $week_id);}
    public function getGame($game_id){return $this->DATABASE_HANDLER->getGame($game_id);}
    public function getRanking($ranking_id){return $this->DATABASE_HANDLER->getRanking($ranking_id);}
    public function getTrade($trade_id){return $this->DATABASE_HANDLER->getTrade($trade_id);}

}