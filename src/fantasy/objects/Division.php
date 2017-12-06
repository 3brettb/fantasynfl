<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Object;
use Illuminate\Database\Eloquent\Model;

class Division extends Object
{

    public $league;

    public $teams;

    public $standings;

    static function mapModel(Model $model)
    {
        $division = new Division();
        $division->league = $model->league;
        $division->teams = Teams::mapModels($model->teams);
        $division->standings = Standings::mapJson($model->standings);
        return $division;
    }

}