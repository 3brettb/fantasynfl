<?php

function cast($obj, $class)
{
    return \Fantasy\NFL\Resources\Cast::cast($obj, $class);
}

function season()
{
    $year = \Fantasy\NFL\FantasyNFLSettings::getYear();
    return \Fantasy\NFL\Fantasy\Models\Season::where('number', $year)
        ->where('league_id', \Fantasy\NFL\FantasyNFLSettings::getLeagueId())
        ->get();
}

function league()
{
    $league_id = \Fantasy\NFL\FantasyNFLSettings::getLeagueId();
    return \Fantasy\NFL\Fantasy\Models\League::find($league_id);
}