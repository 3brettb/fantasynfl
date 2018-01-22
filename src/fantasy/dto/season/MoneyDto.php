<?php

namespace Fantasy\NFL\Fantasy\DTO\Season;

use Fantasy\NFL\Resources\Maps\JsonMapsDto;

class MoneyDto extends JsonMapsDto
{

    public $lastUpdated;

    public $dues;

    public $champion;

    public $runnerup;

    public $teams;

    static function mapJson($data)
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