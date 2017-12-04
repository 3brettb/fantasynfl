<?php

namespace Fantasy\NFL\Resources;

use Illuminate\Database\Eloquent\Model;

abstract class Object
{

    static abstract function mapModel(Model $model);

}