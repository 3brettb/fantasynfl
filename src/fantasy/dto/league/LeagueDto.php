<?php

namespace Fantasy\NFL\Fantasy\DTO\League;

use Fantasy\NFL\FantasyNFL\Resolvers\DataResolver;
use Fantasy\NFL\Resources\MapsDto;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

class LeagueDto extends MapsDto
{

    use DataResolver;

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

    public function activity($id=null)
    {
        return DataReceiver::instance()->getLeagueActivity($this->id, $id);
    }

    public function divisions()
    {
        return DataReceiver::instance()->getDivisions($this->model->season->id);
    }

    public function division($id)
    {
        return DataReceiver::instance()->getDivision($id);
    }

    public function week($number=null, $year=null)
    {
        $id = static::resolveWeekNumber(static::resolveOptionalWeekNumber($number), $year)->id;
        return DataReceiver::instance()->getWeek($id);
    }

    public function season($id=null)
    {
        return DataReceiver::instance()->getSeason($id);
    }

}