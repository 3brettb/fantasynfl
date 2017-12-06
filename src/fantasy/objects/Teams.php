<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\ObjectArray;
use Illuminate\Support\Collection;

class Teams extends ObjectArray
{

    static function mapModels(array $models)
    {
        $teams = new Collection();
        foreach($models as $model)
        {
            $team = Team::mapModel($model);
            $teams->push($team);
        }
        return $teams;
    }

}