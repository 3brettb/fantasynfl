<?php

namespace Fantasy\NFL\FantasyNFL;

use Fantasy\NFL\Enums\RankingType;
use Fantasy\NFL\Enums\StandingsType;
use Fantasy\NFL\FantasyNFL\GetterExplicit as Explicit;
use Fantasy\NFL\FantasyNFL\Settings as StoredSettings;

trait Setters
{

    public static function setLeague($id)
    {
        StoredSettings::setLeagueId($id);
    }

}