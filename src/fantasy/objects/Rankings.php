<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\ObjectArray;
use Illuminate\Database\Eloquent\Model;

class Rankings extends ObjectArray
{

    static  function mapModels(array $models)
    {
        // TODO: Implement mapModels() method.
        return array(new Rankings());
    }

}