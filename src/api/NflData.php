<?php

namespace Fantasy\NFL\API;

use Fantasy\NFL\API\DTO;
use Fantasy\NFL\Enums\PositionStrings;
use Fantasy\NFL\Resources\Common\APIUris as Uri;
use Fantasy\NFL\API\Query\QueryGroup;

class NflData extends NFLAPI
{

    private static $count = 5000;

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

    /**
     * @param null $week
     * @return DTO\WeekRanks\WeekRanksDto[]
     */
    public static function getAllPlayers($week=null)
    {
        $instance = self::instance();
        $query = QueryGroup::define()
            ->query("QB", $instance->get(Uri::WEEKRANKS, [
                'position' => PositionStrings::QB
            ]))
            ->query("RB", $instance->get(Uri::WEEKRANKS, [
                'position' => PositionStrings::RB
            ]))
            ->query("WR", $instance->get(Uri::WEEKRANKS, [
                'position' => PositionStrings::WR
            ]))
            ->query("TE", $instance->get(Uri::WEEKRANKS, [
                'position' => PositionStrings::TE
            ]))
            ->query("K", $instance->get(Uri::WEEKRANKS, [
                'position' => PositionStrings::K
            ]))
            ->query("DEF", $instance->get(Uri::WEEKRANKS, [
                'position' => PositionStrings::DEF
            ]));

        if($week != null) $query->setParams(['week' => $week, 'count' => self::$count]);
        else $query->setParams(['count' => self::$count]);

        $response = $query->execute()->normalize()->get();

        foreach($response as $key => $position)
        {
            $response[$key] = self::convert($position, DTO\WeekRanks\WeekRanksDto::class);
        }
        return $response;
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
        $instance = self::instance();

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
            ->setParams($params);

        $response = $query->execute()->normalize()->get();
        $out = null;
        foreach($response as $item)
        {
            if($out == null) $out = self::convert($item, DTO\Stats\StatsDto::class);
            else $out->players = array_merge($out->players, self::convert($item, DTO\Stats\StatsDto::class)->players);
        }
        return $out;
    }

    /**
     * @param null $week
     * @return DTO\Research\ResearchDto
     */
    public static function getResearch($week=null)
    {
        $query = self::instance()->get(Uri::RESEARCH, [
            'count' => self::$count
        ]);

        if($week != null) $query->set('week', $week);

        $response = $query->execute()->normalize()->get();
        return self::convert($response, DTO\Research\ResearchDto::class);
    }

    /**
     * @param null $week
     * @param null $position
     * @return DTO\WeekRanks\WeekRanksDto[]
     */
    public static function getWeekRanks($week=null,$position=null)
    {
        if($position == null) return self::getAllPlayers($week);

        $query = self::instance()->get(Uri::WEEKRANKS, [
            'position' => $position
        ]);

        if($week != null) $query->setParams(['week' => $week, 'count' => self::$count]);
        else $query->setParams(['count' => self::$count]);

        $response = $query->execute()->normalize()->get();

        $out = array(
            $position => self::convert($response, DTO\WeekRanks\WeekRanksDto::class)
        );
        return $out;
    }

}

