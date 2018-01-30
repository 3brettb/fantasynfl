<?php

namespace Fantasy\NFL\FantasyNFL\Data\League;

use Fantasy\NFL\FantasyNFL\Data\Request;

trait HasLeagueData
{
    
    // ------ Accessors ------------------------------------------------------------------------------------------------

    protected function getLeague(Request $request)
    {
        return LeagueDataController::getLeague($request->arguments(['id']));
    }

    // ------ Aliases --------------------------------------------------------------------------------------------------

    protected function league(Request $request)
    {
        return $this->getLeague($request);
    }

}