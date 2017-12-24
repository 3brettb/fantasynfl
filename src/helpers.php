<?php

use Fantasy\NFL\FantasyNFL\Settings as FantasySettings;
use Fantasy\NFL\FantasyNFL;

function cast($obj, $class)
{
    return \Fantasy\NFL\Resources\Cast::cast($obj, $class);
}

function season()
{
    $year = FantasySettings::getYear();
    return FantasyNFL::season($year);
}

function week()
{
    $week_number = FantasySettings::getWeekNumber();
    return FantasyNFL::week($week_number);
}

function league()
{
    $league_id = FantasySettings::getLeagueId();
    return FantasyNFL::league($league_id);
}