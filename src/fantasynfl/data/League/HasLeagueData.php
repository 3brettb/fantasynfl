<?php

namespace Fantasy\NFL\FantasyNFL\Data\League;

use Fantasy\NFL\FantasyNFL\Data\Request;

trait HasLeagueData
{

    public function getLeague(Request $request)
    {
        LeagueDataController::getLeague($request->arguments(['id']));
    }

}