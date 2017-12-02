<?php

namespace Fantasy\NFL\API;

use Fantasy\NFL\Resources\Common\APIUris as Uri;
use Fantasy\NFL\Resources\Common\APIOptions as Options;
use Fantasy\NFL\API\Query\Query;

class NFLAPI
{

    private $calls;

    private static $instance = null;

    private function __construct()
    {
        $this->init();
    }

    public static function instance()
    {
        if(self::$instance == null){
            self::$instance = new NFLAPI();
        }
        return self::$instance;
    }

    public function perform($call, $params = null)
    {
        $query = $this->get($call, $params);
        return $query->execute();
    }

    public function get($call, $params = null)
    {
        $query = $this->calls[$call];
        if($params != null) {
            foreach ($params as $param => $value) {
                $query->set($param, $value);
            }
        }
        return unserialize(serialize($query));
    }

    private function init()
    {
        $this->calls = array(
            Uri::DRAFTRANKS => Query::define(Uri::DRAFTRANKS)
                ->param("season")
                ->param("count", 50)
                ->param("offset", 0),
            Uri::WEEKRANKS => Query::define(Uri::WEEKRANKS)
                ->param("position", null, null, true, Options::REGULARPOSITIONS)
                ->param("season")
                ->param("week")
                ->param("count", 50)
                ->param("offset", 0),
            Uri::RESEARCH => Query::define(Uri::RESEARCH)
                ->param("sort", null, null, false, Options::RESEARCHSORT)
                ->param("season")
                ->param("week")
                ->param("count", 50)
                ->param("offset", 0),
            Uri::DETAILS => Query::define(Uri::DETAILS)
                ->param("playerId", null, null, true),
            Uri::NEWS => Query::define(Uri::NEWS)
                ->param("count", 50)
                ->param("offset", 0),
            Uri::SCORINGLEADERS => Query::define(Uri::SCORINGLEADERS)
                ->param("season")
                ->param("week")
                ->param("position", null, null, false, Options::ALLPOSITIONS)
                ->param("teamAbbr", null, null, false, Options::NFLTEAMS)
                ->param("sort", "pts", null, false, Options::SCORINGSORT)
                ->param("count", 50)
                ->param("offset", 0),
            Uri::STATS => Query::define(Uri::STATS)
                ->param("statType", "seasonStats", null, false, Options::STATTYPES)
                ->param("season")
                ->param("week")
                ->param("position", null, null, false, Options::ALLPOSITIONS),
            Uri::ADVANCED => Query::define(Uri::ADVANCED)
                ->param("season")
                ->param("week")
                ->param("position", null, null, false, Options::ALLPOSITIONS)
                ->param("teamAbbr", null, null, false, Options::NFLTEAMS)
                ->param("sort", "carries", null, false, Options::ADVANCEDSORT)
                ->param("count", 50)
                ->param("offset", 0),
            Uri::WEEKSTATS => Query::define(Uri::WEEKSTATS)
                ->param("gameId")
                ->param("season")
                ->param("week")
                ->param("dp", 0, null, null, Options::YESNO)
                ->param("position", null, null, false, Options::ALLPOSITIONS),
            Uri::WEEKTIMESTATS => Query::define(Uri::WEEKTIMESTATS)
                ->param("gameId")
                ->param("season")
                ->param("week")
                ->param("timezone", "US/EASTERN")
                ->param("dp", 0, null, null, Options::YESNO),
            Uri::WEEKVIDEOS => Query::define(Uri::WEEKVIDEOS)
                ->param("gameId")
                ->param("season")
                ->param("week")
                ->param("timezone", "US/EASTERN")
        );
    }

}