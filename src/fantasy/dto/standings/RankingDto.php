<?php

namespace Fantasy\NFL\Fantasy\DTO\Standings;

use Fantasy\NFL\Resources\MapsDto;

class RankingDto extends MapsDto
{

    public $official;

    public $composite;

    static function dtomap($data)
    {
        try {
            return self::jsonmap($data);
        } catch(\ErrorException $e) {
            return null;
        }
    }

    static function jsonmap($data)
    {
        $obj = new RankingDto();
        $obj->official = $data->official;
        $obj->composite = $data->composite;
        return $obj;
    }

}