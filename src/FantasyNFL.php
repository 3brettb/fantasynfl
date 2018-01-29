<?php

namespace Fantasy\NFL;

use Fantasy\NFL\FantasyNFL\Accessors as FantasyAccessors;
use Fantasy\NFL\FantasyNFL\Common\FantasyData;
use Fantasy\NFL\FantasyNFL\Modifiers as FantasyModifiers;
use Fantasy\NFL\Fantasy\Models as FantasyModels;
use Fantasy\NFL\FantasyNFL\Settings;

class FantasyNFL extends FantasyData
{

    public static function login($user)
    {
        $team = FantasyModels\Team::find($user->team_id);
        $league = FantasyModels\League::find($team->league_id);
        $season = $league->season;
        $week = $league->week;
        Settings::setLeagueId($league->id);
        Settings::setTeamId($team->id);
        Settings::setSeasonId($season->id);
        Settings::setYear($season->year);
        Settings::setWeekId($week->id);
        Settings::setWeekNumber($week->number);
    }

}