<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Object;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Object
{

    static  function mapModel(Model $model)
    {
        // TODO: Implement mapModel() method.
        return new Ranking();
    }

}