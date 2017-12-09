<?php

namespace Fantasy\NFL\Fantasy\Objects;

use Fantasy\NFL\Resources\Data\JsonArray;
use Illuminate\Support\Collection;

class StandingsGroup extends JsonArray
{

    static function mapJsons(array $jsons)
    {
        $standings = new Collection();
        foreach($jsons as $json)
        {
            $standing = Standings::mapJson($json);
            $standings->push($standing);
        }
        return $standings;
    }

}