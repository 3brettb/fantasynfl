<?php

namespace Fantasy\NFL\Fantasy\DTO\Season;

use Fantasy\NFL\Resources\MapsDto;
use Fantasy\NFL\Fantasy\DTO\Standings\StandingsDto;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

class SeasonDto extends MapsDto
{

    public $id;

    public $year;

    public $standings;

    public $postseason;

    public $money;

    public $model;

    static function dtomap($data)
    {
        $standings = json_decode($data->standings);
        $postseason = json_decode($data->postseason);
        $money = json_decode($data->money);

        $obj = new SeasonDto();
        $obj->id = $data->id;
        $obj->year = $data->year;
        $obj->standings = StandingsDto::dtomap($standings);
        $obj->postseason = PostseasonDto::dtomap($postseason);
        $obj->money = MoneyDto::dtomap($money);
        $obj->model = $data;
        return $obj;
    }

    public function league()
    {
        return DataReceiver::instance()->getLeague($this->model->league_id);
    }

}