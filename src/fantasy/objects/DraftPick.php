<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Data\Object;
use Illuminate\Database\Eloquent\Model;

class DraftPick extends Object
{

    static function mapModel(Model $model)
    {
        // TODO: Complete Method
        return new DraftPick();
    }

}