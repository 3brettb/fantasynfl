<?php

namespace Fantasy\NFL\Fantasy\DTO\Season;

use Fantasy\NFL\API\DTO\MapsDto;
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
        $obj = new SeasonDto();
        $obj->id = $data->id;
        $obj->year = $data->year;
        $obj->standings = StandingsDto::dtomap($data->standings);
        $obj->postseason = PostseasonDto::dtomap($data->postseason);
        $obj->money = MoneyDto::dtomap($data->money);
        $obj->model = $data;
        return $obj;
    }

    public function league()
    {
        return DataReceiver::instance()->getLeague($this->model->league_id);
    }

}