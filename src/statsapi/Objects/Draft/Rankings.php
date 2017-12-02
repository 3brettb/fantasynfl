<?php

namespace Fantasy\NFL\StatsAPI\Objects\Draft;

use Illuminate\Support\Collection;

class Rankings
{

    public $lastRun;

    public $players;

    public function __construct()
    {
        $this->players = new Collection();
    }

    public function addPlayer(Player $player)
    {
        return $this->players->push($player);
    }

}