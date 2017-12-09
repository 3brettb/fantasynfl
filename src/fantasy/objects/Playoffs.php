<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Data\Object;
use Illuminate\Database\Eloquent\Model;

class Playoffs extends Object
{

    static function mapModel(Model $model)
    {
        // TODO: Implement mapModel() method.
        return new Playoffs();
    }

}