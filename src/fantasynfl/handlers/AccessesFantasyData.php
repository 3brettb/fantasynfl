<?php

namespace Fantasy\NFL\FantasyNFL\Handlers;

interface AccessesFantasyData
{

    public function getLeague($league_id);

    public function getLeagueActivity($league_id);

    public function getLeagueStandings($season_id);

    public function getLeagueTrades($league_id);

    public function getSeason($season_id);

    public function getSeasonWeeks($season_id);

    public function getSeasonActivity($season_id);

    public function getWeek($week_id);

    public function getWeekGames($week_id);

    public function getWeekRankings($week_id);

    public function getTeam($team_id);

    public function getDivisions($league_id);

    public function getDivision($division_id);

    public function getDivisionStandings($division_id);

    public function getDraft($draft_id);

    public function getDraftPicks($draft_id);

    public function getRoster($roster_id);

    public function getLineup($team_id, $week_id);

    public function getGame($game_id);

    public function getRanking($ranking_id);

    public function getTrade($trade_id);

}