<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Data\ObjectArray;
use Illuminate\Support\Collection;

class Activitys extends ObjectArray
{

    static function mapModels(array $models)
    {
        $activitys = new Collection();
        foreach($models as $model)
        {
            $activity = Activity::mapModel($model);
            $activitys->push($activity);
        }
        return $activitys;
    }

}