<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Data\ObjectArray;
use Illuminate\Support\Collection;

class TradeItems extends ObjectArray
{

    static function mapModels(array $models)
    {
        $items = new Collection();
        foreach($models as $model)
        {
            $item = TradeItem::mapModel($model);
            $items->push($item);
        }
        return $items;
    }

}