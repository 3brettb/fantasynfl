<?php

namespace Fantasy\NFL\FantasyNFL\Handlers;

interface AccessesPlayerData
{

    public function getPlayers();

    public function getPlayer($player_id);

    public function getPlayerDetails($player_id);

    public function getPlayerSeasonStats($player_id, $season=null);

    public function getPlayerSeasonProjectedStats($player_id, $season=null);

    public function getPlayerWeekStats($player_id, $season=null);

    public function getPlayerWeekProjectedStats($player_id, $season=null);

    public function getResearchInfo($week=null, $player_id=null);

    public function getWeekRanks($week=null, $position=null);

    public function getNews($player_id=null);

    public function getScoringLeaders($week=null, $position=null);

    public function getSeasonStats($season=null, $position=null);

    public function getSeasonProjectedStats($season=null, $position=null);

    public function getWeekStats($week=null, $position=null);

    public function getWeekProjectedStats($week=null, $position=null);

    public function getAdvancedStats($week=null, $position=null);

    public function getGameStats($gameId);

}