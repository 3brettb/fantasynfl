<?php

namespace Fantasy\NFL\Fantasy\DTO\Standings;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class RankingDto extends ObjectMapsDto
{

    public $official;

    public $composite;

    static function mapObject($data)
    {
        $obj = new RankingDto();
        $obj->official = $data->official;
        $obj->composite = $data->composite;
        return $obj;
    }

}