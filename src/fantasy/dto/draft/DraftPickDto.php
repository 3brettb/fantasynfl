<?php

namespace Fantasy\NFL\Fantasy\DTO\Draft;

use Fantasy\NFL\Resources\MapsDto;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

class DraftPickDto extends MapsDto
{

    public $id;

    public $order;

    public $round;

    public $overall;

    public $type;

    public $model;

    static function dtomap($data)
    {
        $obj = new DraftPickDto();
        $obj->id = $data->id;
        $obj->order = $data->order;
        $obj->round = $data->round;
        $obj->overall = $data->overall;
        $obj->type = $data->type;
        $obj->model = $data;
        return $obj;
    }

    public function team()
    {
        return DataReceiver::instance()->getTeam($this->model->team_id);
    }

    public function owner()
    {
        return DataReceiver::instance()->getTeam($this->model->owner_id);
    }

    public function player()
    {
        return DataReceiver::instance()->getPlayer($this->model->player_id);
    }

    public function pick()
    {
        return $this->player();
    }

}