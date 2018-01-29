<?php

namespace Fantasy\NFL\FantasyNFL\Data\League;

use Fantasy\NFL\FantasyNFL\Data\Controller;
use Fantasy\NFL\FantasyNFL\Data\League\Commands\GetLeagueCommand;
use Fantasy\NFL\FantasyNFL\Data\League\Models\League;
use Fantasy\NFL\FantasyNFL\Data\Request;

class LeagueDataController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return League
     */
    public static function getLeague(Request $request)
    {
        $cmd = new GetLeagueCommand($request);
        return $cmd->exec()->first();
    }

}