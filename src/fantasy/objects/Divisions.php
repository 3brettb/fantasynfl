<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Data\ObjectArray;
use Illuminate\Support\Collection;

class Divisions extends ObjectArray
{

    static function mapModels(array $models)
    {
        $divisions = new Collection();
        foreach($models as $model)
        {
            $division = Division::mapModel($model);
            $divisions->push($division);
        }
        return $divisions;
    }

}