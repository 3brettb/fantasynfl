<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Enums\StandingsType;
use Fantasy\NFL\Resources\Data\Object;
use Illuminate\Database\Eloquent\Model;

class TeamStanding extends Object
{

    public $league;

    public $division;

    static function mapModel(Model $model)
    {
        $standing = new TeamStanding();
        $standing->league = Standing::getTeamStanding($model, StandingsType::LEAGUE);
        $standing->division = Standing::getTeamStanding($model, StandingsType::DIVISION);
        return $standing;
    }

}