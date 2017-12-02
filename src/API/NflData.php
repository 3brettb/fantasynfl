<?php

namespace Fantasy\NFL\API;

use Fantasy\NFL\Enums\PositionStrings;
use Fantasy\NFL\Resources\Common\APIUris as Uri;
use Fantasy\NFL\API\Query\QueryGroup;

class NflData extends NFLAPI
{

    public static function UpdatePlayers()
    {
        $instance = NflData::instance();
        $count = 1000;
        $query = QueryGroup::define()
            ->query("QB", $instance->get(Uri::WEEKRANKS, [
                    'position' => PositionStrings::QB,
                    'count' => $count
            ]))
            ->query("RB", $instance->get(Uri::WEEKRANKS, [
                'position' => PositionStrings::RB,
                'count' => $count
            ]))
            ->query("WR", $instance->get(Uri::WEEKRANKS, [
                'position' => PositionStrings::RB,
                'count' => $count
            ]))
            ->query("TE", $instance->get(Uri::WEEKRANKS, [
                'position' => PositionStrings::RB,
                'count' => $count
            ]))
            ->query("K", $instance->get(Uri::WEEKRANKS, [
                'position' => PositionStrings::RB,
                'count' => $count
            ]))
            ->query("DEF", $instance->get(Uri::WEEKRANKS, [
                'position' => PositionStrings::RB,
                'count' => $count
            ]));
        return $query->execute()->normalize()->get();
    }

}

