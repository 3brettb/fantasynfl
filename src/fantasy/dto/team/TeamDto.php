<?php

namespace Fantasy\NFL\Fantasy\DTO\Team;

use Fantasy\NFL\Resources\Maps\ModelMapsDto;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

class TeamDto extends ModelMapsDto
{

    public $id;

    public $name;

    public $mascot;

    public $abbr;

    public $keepers;

    public $block;

    public $model;

    static function mapModel($data)
    {
        $obj = new TeamDto();
        $obj->id = $data->id;
        $obj->name = $data->name;
        $obj->mascot = $data->mascot;
        $obj->abbr = $data->abbr;
        $obj->keepers = $data->keepers;
        $obj->block = TradeBlockDto::map($data->block);
        $obj->model = $data;
        return $obj;
    }

    public function owner()
    {
        return DataReceiver::instance()->getUser($this->model->user_id);
    }

    public function fullname()
    {
        return $this->model->fullname;
    }

    public function division()
    {
        return DataReceiver::instance()->getDivision($this->model->division_id);
    }

    public function standing()
    {
        return DataReceiver::instance()->getLeagueStandings($this->model->league->season->id)->team($this->id);
    }

    public function league()
    {
        return DataReceiver::instance()->getLeague($this->model->league_id);
    }

    public function trades()
    {
        return DataReceiver::instance()->getTeamTrades($this->id);
    }

    public function roster()
    {
        return DataReceiver::instance()->getRoster($this->id);
    }

    public function lineup($week_id = null)
    {
        if($week_id == null) $week_id = $this->model->league->week_id;
        return DataReceiver::instance()->getLineup($this->id, $week_id);
    }

}