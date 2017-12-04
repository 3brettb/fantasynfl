<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\ObjectArray;

class Divisions extends ObjectArray
{

    static function mapModels(array $models)
    {
        // TODO: Implement mapModels() method.
        return array(new Division());
    }

}