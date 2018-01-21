<?php

namespace Fantasy\NFL\FantasyNFL\Resolvers;

use Fantasy\NFL\FantasyNFL\Settings;

trait ResolvesTeam
{

    /**
     * @param $id
     * @return integer
     */
    public static function resolveOptionalTeamId(&$id)
    {
        $id = ($id == null) ? Settings::getTeamId() : $id;
        return $id;
    }

}