<?php

namespace Fantasy\NFL\Fantasy\DTO\Week;

use Fantasy\NFL\Resources\Maps\ModelMapsDto;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

class WeekDto extends ModelMapsDto
{

    public $id;

    public $number;

    public $nflweek;

    public $type;

    public $model;

    static function mapModel($data)
    {
        $obj = new WeekDto();
        $obj->id = $data->id;
        $obj->number = $data->number;
        $obj->nflweek = $data->nflweek;
        $obj->type = $data->type;
        $obj->model = $data;
        return $obj;
    }

    public function season()
    {
        return DataReceiver::instance()->getSeason($this->model->season_id);
    }

    public function rankings()
    {
        return DataReceiver::instance()->getWeekRankings($this->id);
    }

    public function games()
    {
        return DataReceiver::instance()->getWeekGames($this->id);
    }

}