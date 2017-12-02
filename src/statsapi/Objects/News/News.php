<?php

namespace Fantasy\NFL\StatsAPI\Objects\News;

use Illuminate\Support\Collection;

class News
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