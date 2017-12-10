<?php

namespace Fantasy\NFL\API;

use Fantasy\NFL\API\DTO;
use Fantasy\NFL\Enums\PositionStrings;
use Fantasy\NFL\Resources\Common\APIUris as Uri;
use Fantasy\NFL\API\Query\QueryGroup;

class NflData extends NFLAPI
{

    public static function convert($response_data, $dto_class)
    {
        return $dto_class::dtomap($response_data);
    }

    /**
     * @param $player_id
     * @return DTO\PlayerDetails\PlayerDto
     */
    public static function getPlayer($player_id)
    {
        $query = NFLAPI::instance()->get(Uri::DETAILS, [
           'playerId' => $player_id
        ]);
        $response = $query->execute()->normalize()->get();
        return self::convert($response->players[0], DTO\PlayerDetails\PlayerDto::class);
    }

    public static function getAllPlayers()
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

    /**
     * @param null $type
     * @param null $season
     * @param null $week
     * @return DTO\Stats\StatsDto
     */
    public static function getStats($type=null, $season=null, $week=null)
    {
        $params = array();
        $instance = NflData::instance();

        if($season != null) $params['season'] = $season;
        if($week != null) $params['week'] = $week;
        if($type != null) $params['statType'] = $type;

        $query = QueryGroup::define()
            ->query("QB", $instance->get(Uri::STATS, [
                'position' => PositionStrings::QB
            ]))
            ->query("RB", $instance->get(Uri::STATS, [
                'position' => PositionStrings::RB
            ]))
            ->query("WR", $instance->get(Uri::STATS, [
                'position' => PositionStrings::WR
            ]))
            ->query("TE", $instance->get(Uri::STATS, [
                'position' => PositionStrings::TE
            ]))
            ->query("K", $instance->get(Uri::STATS, [
                'position' => PositionStrings::K
            ]))
            ->query("DEF", $instance->get(Uri::STATS, [
                'position' => PositionStrings::DEF
            ]))
            ->applyGroupParams($params);

        $response = $query->execute()->normalize()->get();
        $out = null;
        foreach($response as $item)
        {
            if($out == null) $out = self::convert($item, DTO\Stats\StatsDto::class);
            else $out->players = array_merge($out->players, self::convert($item, DTO\Stats\StatsDto::class)->players);
        }
        return $out;
    }

    public static function getResearch()
    {
        $max = 5000;
        $query = NFLAPI::instance()->get(Uri::RESEARCH, [
            'count' => $max
        ]);
        $response = $query->execute()->normalize()->get();
        return self::convert($response, DTO\Research\ResearchDto::class);
    }

}

