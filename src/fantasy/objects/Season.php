<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Data\Object;
use Illuminate\Database\Eloquent\Model;

class Season extends Object
{

    public $league;

    public $divisions;

    public $current_week;

    public $weeks;

    public $standings;

    static function mapModel(Model $model)
    {
        $season = new Season();
        $season->league = $model->league;
        $season->divisions = $model->divisions;
        $season->current_week = $season->league->current_week;
        $season->weeks = $model->weeks;
        $season->standings = Standings::mapJson($model->standings);
        return $season;
    }

}