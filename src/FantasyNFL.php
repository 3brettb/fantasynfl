<?php

namespace Fantasy\NFL;

use Fantasy\NFL\FantasyNFL\Accessors as FantasyAccessors;
use Fantasy\NFL\FantasyNFL\Modifiers as FantasyModifiers;
use Fantasy\NFL\Fantasy\Models as FantasyModels;

class FantasyNFL
{

    use FantasyAccessors, FantasyModifiers;

    public static function login($user)
    {
        $team = FantasyModels\Team::find($user->team_id);
        $league = FantasyModels\League::find($team->league_id);
        self::setLeague($league->id);
        self::setTeamId($team->id);
        self::setYear($league->season->year);
        self::setWeek($league->week_id);
    }

}