<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Enums\WeekStrings;
use Fantasy\NFL\Enums\WeekType;
use Fantasy\NFL\Resources\Data\Object;
use Illuminate\Database\Eloquent\Model;

class Week extends Object
{

    public $season;

    public $number;

    public $nflweek;

    public $games;

    public $rankings;

    public $type;

    static function mapModel(Model $model)
    {
        $week = new Week();
        $week->season = $model->season;
        $week->number = $model->number;
        $week->nflweek = $model->nflweek;
        $week->games = Games::mapModels($model->games);
        $week->rankings = Rankings::mapModels($model->rankings);
        $week->type = static::getType($model->type);
        return $week;
    }

    static function getType($type_int)
    {
        switch($type_int)
        {
            case WeekType::OFFSEASON:
                return WeekStrings::OFFSEASON;
            case WeekType::POSTSEASON:
                return WeekStrings::POSTSEASON;
            default:
            case WeekType::REGULAR:
                return WeekStrings::REGULAR;
        }
    }

}