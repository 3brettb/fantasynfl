<?php

namespace Fantasy\NFL\StatsAPI\Objects\Research;

use Illuminate\Support\Collection;

class Info
{

    public $lastUpdated;

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