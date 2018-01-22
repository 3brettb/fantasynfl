<?php

namespace Fantasy\NFL\Fantasy\DTO\Season;

use Fantasy\NFL\Resources\Maps\ModelMapsDto;
use Fantasy\NFL\Fantasy\DTO\Standings\StandingsDto;
use Fantasy\NFL\FantasyNFL\Handlers\DataReceiver;

class SeasonDto extends ModelMapsDto
{

    public $id;

    public $year;

    public $standings;

    public $postseason;

    public $money;

    public $model;

    static function mapModel($data)
    {
        $obj = new SeasonDto();
        $obj->id = $data->id;
        $obj->year = $data->year;
        $obj->standings = StandingsDto::map($data->standings);
        $obj->postseason = PostseasonDto::map($data->postseason);
        $obj->money = MoneyDto::map($data->money);
        $obj->model = $data;
        return $obj;
    }

    public function league()
    {
        return DataReceiver::instance()->getLeague($this->model->league_id);
    }

}