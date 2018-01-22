<?php

namespace Fantasy\NFL\Fantasy\DTO\Season;

use Fantasy\NFL\Resources\Maps\JsonMapsDto;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

class PostseasonDto extends JsonMapsDto
{

    public $type;

    public $start_week_id;

    public $end_week_id;

    public $lastUpdated;

    public $year;

    public $teams;

    public $games;

    static function mapJson($data)
    {
        $obj = new PostseasonDto();
        $obj->type = $data->type;
        $obj->start_week_id = $data->start_week_id;
        $obj->end_week_id = $data->end_week_id;
        $obj->lastUpdated = $data->lastUpdated;
        $obj->year = $data->year;
        $obj->teams = self::mapArray($data->teams, PostseasonTeamDto::class);
        $obj->games = self::mapArray($data->games, PostseasonGameDto::class);
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