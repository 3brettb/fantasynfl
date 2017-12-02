<?php

namespace Fantasy\NFL\StatsAPI\Objects\WeekStats;

use Fantasy\NFL\StatsAPI\Objects\StatPlayer;

class WeekStat extends StatPlayer
{

    public $stats;

    static function map(StatPlayer & $player, $stats = null)
    {
        cast($player, Player::class);
        $player->stats = $stats;
        return $player;
    }

}