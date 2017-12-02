<?php

namespace Fantasy\NFL\StatsAPI\Objects\WeekStats;

use Illuminate\Support\Collection;

class StatSet
{

    public $playerStats;

    public function __construct()
    {
        $this->playerStats = new Collection();
    }

    public function addWeekStat(WeekStat $weekstat)
    {
        return $this->playerStats->push($weekstat);
    }

}