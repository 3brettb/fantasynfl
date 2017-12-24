<?php

namespace Fantasy\NFL\Fantasy\DTO\League;

use Fantasy\NFL\API\DTO\MapsDto;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

class LeagueDto extends MapsDto
{

    public $id;

    public $name;

    public $model;

    static function dtomap($data)
    {
        $obj = new LeagueDto();
        $obj->id = $data->id;
        $obj->name = $data->name;
        $obj->model = $data;
        return $obj;
    }

    public function players()
    {
        return DataReceiver::instance()->getPlayers();
    }

    public function teams()
    {
        return DataReceiver::instance()->getLeagueTeams($this->id);
    }

    public function team($id)
    {
        return DataReceiver::instance()->getTeam($id);
    }

    public function activity()
    {
        return DataReceiver::instance()->getLeagueActivity($this->id);
    }

    public function divisions()
    {
        return DataReceiver::instance()->getDivisions($this->model->season->id);
    }

    public function division($id)
    {
        return DataReceiver::instance()->getDivision($id);
    }

    public function week($id=null)
    {
        return DataReceiver::instance()->getWeek($id);
    }

    public function season($id=null)
    {
        return DataReceiver::instance()->getSeason($id);
    }

}