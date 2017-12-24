<?php

namespace Fantasy\NFL\Fantasy\DTO\Standings;

use Fantasy\NFL\API\DTO\MapsDto;

class RankingDto extends MapsDto
{

    public $official;

    public $composite;

    static function dtomap($data)
    {
        $obj = new RankingDto();
        $obj->official = $data->official;
        $obj->composite = $data->composite;
        return $obj;
    }

}