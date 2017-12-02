<?php

namespace Fantasy\NFL\StatsAPI\Objects\Scoring;

class Leaders
{

    public $season;

    public $week;

    public $positions;

    public function __construct()
    {
        $this->positions = new Positions();
    }

    public function addPlayer(Player $player)
    {
        return $this->positions->add($player);
    }

}