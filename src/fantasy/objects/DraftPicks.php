<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\ObjectArray;
use Illuminate\Support\Collection;

class DraftPicks extends ObjectArray
{

    static function mapModels(array $models)
    {
        $picks = new Collection();
        foreach($models as $model)
        {
            $pick = DraftPick::mapModel($model);
            $picks->push($pick);
        }
        return $picks;
    }

}