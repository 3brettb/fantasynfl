<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Data\ObjectArray;
use Fantasy\NFL\StatsAPI\Models\Player;

class Players extends ObjectArray
{

    static  function mapModels(array $models)
    {
        // TODO: Implement mapModels() method.
        return array(new Player());
    }

}