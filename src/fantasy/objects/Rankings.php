<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\ObjectArray;
use Illuminate\Support\Collection;

class Rankings extends ObjectArray
{

    static  function mapModels(array $models)
    {
        $rankings = new Collection();
        foreach($models as $model)
        {
            $ranking = Ranking::mapModel($model);
            $rankings->push($ranking);
        }
        return $rankings;
    }

}