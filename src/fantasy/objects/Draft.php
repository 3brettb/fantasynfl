<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Object;
use Illuminate\Database\Eloquent\Model;

class Draft extends Object
{

    static function mapModel(Model $model)
    {
        // TODO: Complete this method
        return new Draft();
    }

}