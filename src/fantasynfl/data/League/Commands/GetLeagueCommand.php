<?php

namespace Fantasy\NFL\FantasyNFL\Data\League\Commands;

use Fantasy\NFL\Fantasy\Models\League;
use Fantasy\NFL\FantasyNFL\Data\Command;
use Fantasy\NFL\FantasyNFL\Data\Request;
use Fantasy\NFL\FantasyNFL\Settings;

class GetLeagueCommand extends Command
{

    private $league_id;

    public function __construct(Request $request)
    {
        $this->league_id = $request->issetOr('id', Settings::getLeagueId());
    }

    protected  function execute()
    {
        $league = League::find($this->league_id);
    }
}