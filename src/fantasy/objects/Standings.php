<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Data\ObjectJson;

class Standings extends ObjectJson
{

    static  function mapJson(string $json)
    {
        // TODO: Implement mapJson() method.
        return new Standings();
    }

}