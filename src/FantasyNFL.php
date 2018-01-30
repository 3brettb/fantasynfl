<?php

namespace Fantasy\NFL;

use Fantasy\NFL\FantasyNFL\FantasyData;
use Fantasy\NFL\FantasyNFL\Models as FantasyModels;
use Fantasy\NFL\FantasyNFL\Settings;

class FantasyNFL extends FantasyData
{

    public static function login($user)
    {
        $team = FantasyModels\Team::find($user->team_id);
        $league = FantasyModels\League::find($team->league_id);
        Settings::initializeSession($league, $team);
    }

}