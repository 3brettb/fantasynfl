<?php

namespace Fantasy\NFL\API;

use Fantasy\NFL\Enums\PositionStrings;
use Fantasy\NFL\Resources\Common\APIUris as Uri;
use Fantasy\NFL\API\Query\QueryGroup;

class NflData extends NFLAPI
{

    public static function AllPlayers()
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
                'position' => PositionStrings::WR,
                'count' => $count
            ]))
            ->query("TE", $instance->get(Uri::WEEKRANKS, [
                'position' => PositionStrings::TE,
                'count' => $count
            ]))
            ->query("K", $instance->get(Uri::WEEKRANKS, [
                'position' => PositionStrings::K,
                'count' => $count
            ]))
            ->query("DEF", $instance->get(Uri::WEEKRANKS, [
                'position' => PositionStrings::DEF,
                'count' => $count
            ]));
        return $query->execute()->normalize()->get();
    }

}

