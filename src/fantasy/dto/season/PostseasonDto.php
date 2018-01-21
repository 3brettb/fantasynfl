<?php

namespace Fantasy\NFL\Fantasy\DTO\Season;

use Fantasy\NFL\Resources\MapsDto;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

class PostseasonDto extends MapsDto
{

    public $type;

    public $start_week_id;

    public $end_week_id;

    public $lastUpdated;

    public $year;

    public $teams;

    public $games;

    static function dtomap($data)
    {
        try {
            return self::jsonmap($data);
        } catch(\ErrorException $e) {
            return null;
        }
    }

    static function jsonmap($data)
    {
        $obj = new PostseasonDto();
        $obj->type = $data->type;
        $obj->start_week_id = $data->start_week_id;
        $obj->end_week_id = $data->end_week_id;
        $obj->lastUpdated = $json->lastUpdated;
        $obj->year = $json->year;
        $obj->teams = self::mapArray($json->teams, PostseasonTeamDto::class);
        $obj->games = self::mapArray($json->games, PostseasonGameDto::class);
        return $obj;
    }

    public function start_week()
    {
        return DataReceiver::instance()->getWeek($this->start_week_id);
    }

    public function end_week()
    {
        return DataReceiver::instance()->getWeek($this->end_week_id);
    }

}