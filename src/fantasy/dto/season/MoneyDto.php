<?php

namespace Fantasy\NFL\Fantasy\DTO\Season;

use Fantasy\NFL\Resources\MapsDto;

class MoneyDto extends MapsDto
{

    public $lastUpdated;

    public $dues;

    public $champion;

    public $runnerup;

    public $teams;

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
        $obj = new MoneyDto();
        $obj->lastUpdated = $data->lastUpdated;
        $obj->dues = $data->dues;
        $obj->champion = $data->champion;
        $obj->runnerup = $data->runnerup;
        $obj->teams = self::mapArray($data->teams, MoneyTeamDto::class);
        return $obj;
    }

}