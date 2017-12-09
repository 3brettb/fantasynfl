<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Data\ObjectArray;

class Roster extends ObjectArray
{

    static function mapModels(array $models)
    {
        // TODO: Implement this method
        return new Roster();
    }

}