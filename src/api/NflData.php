<?php

namespace Fantasy\NFL\API;

use Fantasy\NFL\API\DTO;
use Fantasy\NFL\Fantasy\DTO\League\PlayersDto;
use Fantasy\NFL\Resources\Common\APIUris as Uri;

class NflData extends NFLAPI
{

    private static $count = 5000;

    private static $news_count = 500;

    public static function convert($response_data, $dto_class)
    {
        return $dto_class::map($response_data);
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
        $query = parent::getDefaultPositionsQueryGroup(Uri::WEEKRANKS);

        if($week != null) $query->setParams(['week' => $week, 'count' => self::$count]);
        else $query->setParams(['count' => self::$count]);

        $response = $query->execute()->normalize()->get();

        foreach($response as $key => $position)
        {
            // TODO: Do we want to convert these to dto's here? or in the handlers. Also, this could use UsesMapMethods trait
            $response[$key] = self::convert($position, DTO\WeekRanks\WeekRanksDto::class);
        }
        return $response;
    }

    /**
     * @param $ids
     * @return PlayerDto[]
     */
    public static function getPlayers($ids)
    {
        $query = parent::getPlayersQuery($ids);
        $response = $query->execute()->normalize()->get();
        $players = collect();
        foreach($response as $data)
        {
            foreach($data->players as $player)
            {
                $players->push($player);
            }
        }
        return PlayersDto::map($players->toArray());
    }

    /**
     * @param null $type
     * @param null $season
     * @param null $week
     * @param null $position
     * @return DTO\Stats\StatsDto
     */
    public static function getStats($type=null, $position = null, $season=null, $week=null)
    {
        $params = array();

        if($season != null) $params['season'] = $season;
        if($week != null) $params['week'] = $week;
        if($type != null) $params['statType'] = $type;
        if($position != null) $params['position'] = $position;

        $query = parent::getDefaultPositionsQueryGroup(Uri::STATS)->setParams($params);

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

    /**
     * @return DTO\News\NewsDto
     */
    public static function getNews()
    {
        $query = self::instance()->get(Uri::NEWS, [
            'count' => self::$news_count
        ]);
        $response = $query->execute()->normalize()->get();
        return self::convert($response, DTO\News\NewsDto::class);
    }

    /**
     * @param null $week
     * @param null $position
     * @return DTO\ScoringLeaders\ScoringLeadersDto[]
     */
    public static function getScoringLeaders($week=null, $position=null)
    {
        if($position != null)
        {
            $query = self::instance()->get(Uri::SCORINGLEADERS, [
                'position' => $position
            ]);
            if($week != null) $query->setParams(['week' => $week]);

            $response = $query->execute()->normalize()->get();

            return array(
                $position => self::convert($response, DTO\ScoringLeaders\ScoringLeadersDto::class)
            );
        }
        else
        {
            $query = parent::getDefaultPositionsQueryGroup(Uri::SCORINGLEADERS);
            if($week != null) $query->setParams(['week' => $week]);

            $response = $query->execute()->normalize()->get();

            foreach($response as $key => $group)
            {
                $response[$key] = self::convert($group, DTO\ScoringLeaders\ScoringLeadersDto::class);
            }
            return $response;
        }
    }

    /**
     * @param null $week
     * @param null $season
     * @param null $position
     * @return DTO\Advanced\AdvancedDto[]
     */
    public static function getAdvancedStats($position = null, $week = null, $season = null)
    {
        if($position != null)
        {
            $query = self::instance()->get(Uri::ADVANCED, [
                'position' => $position
            ])->setParams(['count' => static::$count]);
            if($week != null) $query->setParams(['week' => $week]);
            if($season != null) $query->setParams(['season' => $season]);

            $response = $query->execute()->normalize()->get();

            return array(
                $position => self::convert($response, DTO\Advanced\AdvancedDto::class)
            );
        }
        else
        {
            $query = parent::getDefaultPositionsQueryGroup(Uri::ADVANCED)->setParams(['count' => static::$count]);
            if($week != null) $query->setParams(['week' => $week]);
            if($season != null) $query->setParams(['season' => $season]);

            $response = $query->execute()->normalize()->get();

            foreach($response as $key => $group)
            {
                $response[$key] = self::convert($group, DTO\Advanced\AdvancedDto::class);
            }
            return $response;
        }
    }

    /**
     * @param $gameId
     * @return DTO\GameStats\GameStatsDto
     */
    public static function getGameStats($gameId)
    {
        $query = self::instance()->get(Uri::WEEKSTATS, [
            'gameId' => $gameId
        ]);

        $response = $query->execute()->normalize()->get();

        return self::convert($response, DTO\GameStats\GameStatsDto::class);
    }

    public static function getStatsConfig()
    {
        $query = self::instance()->get(Uri::GAMESTATS);

        $response = $query->execute()->normalize()->get();

        return self::convert($response, DTO\Config\StatsConfigDto::class);
    }

}

