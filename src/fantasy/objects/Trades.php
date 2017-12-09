<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Data\ObjectArray;
use Illuminate\Support\Collection;

class Trades extends ObjectArray
{

    static function mapModels(array $models)
    {
        $trades = new Collection();
        foreach($models as $model)
        {
            $trade = Trade::mapModel($model);
            $trades->push($trade);
        }
        return $trades;
    }

}