<?php

namespace Fantasy\NFL\FantasyNFL\Handlers;

use Fantasy\NFL\StatsAPI\Models\Player;
use Fantasy\NFL\StatsAPI\Objects\StatPlayer;

class DatabaseHandler implements Handler, AccessesPlayerData, AccessesFantasyData
{

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

    public function getLeague($league_id)
    {
        // TODO: Implement getLeague() method.
    }

    public function getLeagueActivity($league_id)
    {
        // TODO: Implement getLeagueActivity() method.
    }

    public function getLeagueStandings($season_id)
    {
        // TODO: Implement getLeagueStandings() method.
    }

    public function getLeagueTrades($league_id)
    {
        // TODO: Implement getLeagueTrades() method.
    }

    public function getSeason($season_id)
    {
        // TODO: Implement getSeason() method.
    }

    public function getSeasonWeeks($season_id)
    {
        // TODO: Implement getSeasonWeeks() method.
    }

    public function getSeasonActivity($season_id)
    {
        // TODO: Implement getSeasonActivity() method.
    }

    public function getWeek($week_id)
    {
        // TODO: Implement getWeek() method.
    }

    public function getWeekGames($week_id)
    {
        // TODO: Implement getWeekGames() method.
    }

    public function getWeekRankings($week_id)
    {
        // TODO: Implement getWeekRankings() method.
    }

    public function getTeam($team_id)
    {
        // TODO: Implement getTeam() method.
    }

    public function getDivisions($league_id)
    {
        // TODO: Implement getDivisions() method.
    }

    public function getDivision($division_id)
    {
        // TODO: Implement getDivision() method.
    }

    public function getDivisionStandings($division_id)
    {
        // TODO: Implement getDivisionStandings() method.
    }

    public function getDraft($draft_id)
    {
        // TODO: Implement getDraft() method.
    }

    public function getDraftPicks($draft_id)
    {
        // TODO: Implement getDraftPicks() method.
    }

    public function getRoster($roster_id)
    {
        // TODO: Implement getRoster() method.
    }

    public function getLineup($team_id, $week_id)
    {
        // TODO: Implement getLineup() method.
    }

    public function getGame($game_id)
    {
        // TODO: Implement getGame() method.
    }

    public function getRanking($ranking_id)
    {
        // TODO: Implement getRanking() method.
    }

    public function getTrade($trade_id)
    {
        // TODO: Implement getTrade() method.
    }

}