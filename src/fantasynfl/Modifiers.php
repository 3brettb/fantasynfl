<?php

namespace Fantasy\NFL\FantasyNFL;

use Fantasy\NFL\FantasyNFL\Settings as StoredSettings;
use Fantasy\NFL\Fantasy\Models as FantasyModel;

trait Modifiers
{

    public static function setLeague($id)
    {
        StoredSettings::setLeagueId($id);
    }

    public static function createLeague($data)
    {
        return FantasyModel\League::create($data);
    }

}