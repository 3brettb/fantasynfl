<?php

namespace Fantasy\NFL\FantasyNFL\Resolvers;

use Fantasy\NFL\Fantasy\Models\Season;
use Fantasy\NFL\FantasyNFL\Settings;

trait ResolvesLeague
{

    /**
     * @param $id
     * @return integer
     */
    public static function resolveOptionalLeagueId(&$id)
    {
        $id = ($id == null) ? Settings::getLeagueId() : $id;
        return $id;
    }

}