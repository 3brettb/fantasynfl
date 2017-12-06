<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Object;
use Illuminate\Database\Eloquent\Model;

class Standing extends Object
{

    public $type;

    public $name;

    public $team;

    public $wins;

    public $losses;

    public $ties;

    public $official_rank;

    public $composite_rank;

    public $standing;

    static function mapModel(Model $model)
    {
        // Not Implemented
    }

}