<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Data\Object;
use Illuminate\Database\Eloquent\Model;

class Team extends Object
{

    public $league;

    public $owner;

    public $name;

    public $abbr;

    public $standing;

    static function mapModel(Model $model)
    {
        $team = new Team();
        $team->league = $model->league;
        $team->owner = $model->owner;
        $team->name = $model->fullname;
        $team->abbr = $model->abbr;
        $team->standing = TeamStanding::mapModel($model);
        return $team;
    }

}