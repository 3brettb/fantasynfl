<?php

namespace Fantasy\NFL\FantasyNFL\Data\Activity\Commands;

use Fantasy\NFL\FantasyNFL\Models\Activity;
use Fantasy\NFL\FantasyNFL\Data\Command;
use Fantasy\NFL\FantasyNFL\Data\Request;
use Fantasy\NFL\FantasyNFL\Settings;

class GetActivityCommand extends Command
{

    private $league_id;

    protected $class = \Fantasy\NFL\FantasyNFL\Data\Activity\Models\Activity::class;

    public function __construct(Request $request)
    {
        $this->league_id = $request->issetOr('league_id', Settings::getLeagueId());
    }

    protected  function execute()
    {
        return Activity::where('league_id', $this->league_id)->get();
    }
}