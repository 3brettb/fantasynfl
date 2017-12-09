<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Data\Object;
use Illuminate\Database\Eloquent\Model;

class Activity extends Object
{

    static function mapModel(Model $model)
    {
        $activity = new Activity();
        // TODO: Complete this method
        return $activity;
    }

}