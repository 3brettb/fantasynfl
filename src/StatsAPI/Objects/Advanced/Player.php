<?php

namespace Fantasy\NFL\StatsAPI\Objects\Advanced;

use Fantasy\NFL\StatsAPI\Objects\StatPlayer;

class Player extends StatPlayer
{

    public $opponentTeamAbbr;

    public $stats;

    public $status;

    static function map(StatPlayer & $player, Stats $stats = null, $oppTeamAbbr = null, $status = null)
    {
        cast($player, Player::class);
        $player->opponentTeamAbbr = $oppTeamAbbr;
        $player->stats = $stats;
        $player->status = $status;
        return $player;
    }

}