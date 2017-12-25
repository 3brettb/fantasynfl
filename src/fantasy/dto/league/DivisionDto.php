<?php

namespace Fantasy\NFL\Fantasy\DTO\League;

use Fantasy\NFL\Resources\MapsDto;
use Fantasy\NFL\Fantasy\DTO\Standings\StandingsDto;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

class DivisionDto extends MapsDto
{

    public $id;

    public $name;

    public $model;

    static function dtomap($data)
    {
        $obj = new DivisionDto();
        $obj->id = $data->id;
        $obj->name = $data->name;
        $obj->model = $data;
        return $obj;
    }

    public function league()
    {
        return DataReceiver::instance()->getLeague($this->model->league->id);
    }

    public function season()
    {
        return DataReceiver::instance()->getSeason($this->model->season_id);
    }

    public function teams()
    {
        return DataReceiver::instance()->getDivisionTeams($this->id);
    }

    public function standings()
    {
        return StandingsDto::dtomap($this->model->standings);
    }

}