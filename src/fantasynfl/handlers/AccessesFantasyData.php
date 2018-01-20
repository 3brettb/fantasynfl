<?php

namespace Fantasy\NFL\FantasyNFL\Handlers;

interface AccessesFantasyData
{

    public function getLeague($league_id);

    public function getLeagueActivity($league_id, $id=null);

    public function getLeagueStandings($season_id);

    public function getLeagueTrades($league_id);

    public function getLeagueTeams($league_id);

    public function getSeason($season_id);

    public function getSeasonWeeks($season_id);

    public function getSeasonActivity($season_id);

    public function getSeasonTrades($season_id);

    public function getWeek($week_id);

    public function getWeekGames($week_id);

    public function getWeekRankings($week_id);

    public function getTeam($team_id);

    public function getTeamTrades($team_id);

    public function getDivisions($season_id);

    public function getDivision($division_id);

    public function getDivisionTeams($division_id);

    public function getAllDivisionStandings($season_id);

    public function getDivisionStandings($division_id);

    public function getDraft($draft_id);

    public function getDraftPicks($team_id, $draft_id);

    public function getRoster($team_id);

    public function getLineup($team_id, $week_id);

    public function getGame($game_id);

    public function getRanking($ranking_id);

    public function getTrade($trade_id);

    public function getPostseason($type, $season_id);

    public function getUser($user_id);

}