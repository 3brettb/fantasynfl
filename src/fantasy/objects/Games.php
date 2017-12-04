<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\ObjectArray;

class Games extends ObjectArray
{

    static  function mapModels(array $models)
    {
        // TODO: Implement mapModels() method.
        return array(new Game());
    }

}