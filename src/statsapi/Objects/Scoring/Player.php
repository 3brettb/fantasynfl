<?php

namespace Fantasy\NFL\StatsAPI\Objects\Scoring;

use Fantasy\NFL\StatsAPI\Objects\StatPlayer;

class Player extends StatPlayer
{

    public $opponentTeamAbbr;

    public $rank;

    public $statsLine;

    public $stats;

    static function map(StatPlayer & $player, $oppTeamAbbr = null, $rank = null, $statsLine = null, $stats = null)
    {
        cast($player, Player::class);
        $player->opponentTeamAbbr = $oppTeamAbbr;
        $player->rank = $rank;
        $player->statsLine = $statsLine;
        $player->stats = $stats;
        return $player;
    }

}