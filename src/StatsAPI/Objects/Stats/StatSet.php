<?php

namespace Fantasy\NFL\StatsAPI\Objects\Stats;

use Illuminate\Support\Collection;

class StatSet
{

    public $statType;

    public $season;

    public $week;

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