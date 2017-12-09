<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Data\ObjectArray;
use Illuminate\Support\Collection;

class Weeks extends ObjectArray
{

    static function mapModels(array $models)
    {
        $weeks = new Collection();
        foreach($models as $model)
        {
            $week = Week::mapModel($model);
            $weeks->push($week);
        }
        return $weeks;
    }

}