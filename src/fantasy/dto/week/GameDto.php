<?php

namespace Fantasy\NFL\Fantasy\DTO\Week;

use Fantasy\NFL\Resources\Maps\ModelMapsDto;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

class GameDto extends ModelMapsDto
{

    public $id;

    public $complete;

    public $type;

    public $stats;

    public $model;

    static function mapModel($data)
    {
        $obj = new GameDto();
        $obj->id = $data->id;
        $obj->complete = $data->complete;
        $obj->type = $data->type;
        $obj->stats = self::mapArray($data->stats, GameStatsDto::class);
        $obj->model = $data;
        return $obj;
    }

    public function week()
    {
        return DataReceiver::instance()->getWeek($this->model->week_id);
    }

    public function home()
    {
        return DataReceiver::instance()->getTeam($this->model->home_id);
    }

    public function away()
    {
        return DataReceiver::instance()->getTeam($this->model->away_id);
    }

    public function winner()
    {
        return DataReceiver::instance()->getTeam($this->model->winner_id);
    }

}