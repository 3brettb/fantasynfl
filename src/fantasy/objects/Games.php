<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Data\ObjectArray;
use Illuminate\Support\Collection;

class Games extends ObjectArray
{

    static function mapModels(array $models)
    {
        $games = new Collection();
        foreach($models as $model)
        {
            $game = Game::mapModel($model);
            $games->push($game);
        }
        return $games;
    }

}