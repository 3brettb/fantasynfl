<?php

use Fantasy\NFL\FantasyNFL\Settings as FantasySettings;
use Fantasy\NFL\FantasyNFL;

/**
 * @return FantasyNFL\FantasyData
 */
function fantasy()
{
    return FantasyNFL::instance();
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