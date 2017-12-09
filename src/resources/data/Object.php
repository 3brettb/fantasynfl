<?php

namespace Fantasy\NFL\Resources\Data;

use Illuminate\Database\Eloquent\Model;

abstract class Object
{

    static abstract function mapModel(Model $model);

}