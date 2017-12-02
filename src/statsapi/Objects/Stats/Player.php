<?php

namespace Fantasy\NFL\StatsAPI\Objects\Stats;

use Fantasy\NFL\StatsAPI\Objects\StatPlayer;

class Player extends StatPlayer
{

    public $stats;

    static function map(StatPlayer & $player, $stats = null)
    {
        cast($player, Player::class);
        $player->stats = $stats;
        return $player;
    }

}