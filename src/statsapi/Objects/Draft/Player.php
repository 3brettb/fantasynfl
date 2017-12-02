<?php

namespace Fantasy\NFL\StatsAPI\Objects\Draft;

use Fantasy\NFL\StatsAPI\Objects\StatPlayer;

class Player extends StatPlayer
{

    public $rank;

    public $auction;

    public $stock;

    static function map(StatPlayer & $player, $rank = null, $auction = null, $stock = null)
    {
        cast($player, Player::class);
        $player->rank = $rank;
        $player->auction = $auction;
        $player->stock = $stock;
        return $player;
    }

}