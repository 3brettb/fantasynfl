<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Data\Object;
use Fantasy\NFL\StatsAPI\Models\Player;
use Illuminate\Database\Eloquent\Model;

class League extends Object
{

    public $name;

    public $season;

    public $teams;

    public $standings;

    public $players;

    public $weeks;

    public $current_week;

    static function mapModel(Model $model)
    {
        $league = new League();
        $league->name = $model->name;
        $league->season = $model->season;
        $league->teams = $model->teams;
        $league->standings = Standings::mapJson($model->season->standings);
        $league->players = Players::mapModels(Player::all());
        $league->weeks = $model->weeks;
        $league->current_week = $model->week;
        return $league;
    }

}