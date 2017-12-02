<?php

namespace Fantasy\NFL\StatsAPI\Objects\Research;

use Fantasy\NFL\StatsAPI\Objects\StatPlayer;

class Player extends StatPlayer
{

    public $opponentTeamAbbr;

    public $percentOwned;

    public $percentOwnedChange;

    public $percentStarted;

    public $percentStartedChange;

    public $depthChartOrder;

    public $numAdds;

    public $numDrops;

    static function map(StatPlayer & $player,
                        $oppTeamAbbr = null,
                        $percentOwned = null,
                        $percentOwnedChange = null,
                        $percentStarted = null,
                        $percentStartedChange = null,
                        $depthChartOrder = null,
                        $numAdds = null,
                        $numDrops = null)
    {
        cast($player, Player::class);
        $player->opponentTeamAbbr = $oppTeamAbbr;
        $player->percentOwned = $percentOwned;
        $player->percentOwnedChange = $percentOwnedChange;
        $player->percentStarted = $percentStarted;
        $player->percentStartedChange = $percentStartedChange;
        $player->depthChartOrder = $depthChartOrder;
        $player->numAdds = $numAdds;
        $player->numDrops = $numDrops;
        return $player;
    }

}