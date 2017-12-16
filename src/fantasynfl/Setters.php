<?php

namespace Fantasy\NFL\FantasyNFL;

use Fantasy\NFL\FantasyNFL\Settings as StoredSettings;

trait Setters
{

    public static function setLeague($id)
    {
        StoredSettings::setLeagueId($id);
    }

}