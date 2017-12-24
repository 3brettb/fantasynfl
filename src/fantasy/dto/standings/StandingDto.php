<?php

namespace Fantasy\NFL\Fantasy\DTO\Standings;

use Fantasy\NFL\API\DTO\MapsDto;

class StandingDto extends MapsDto
{

    public $id;

    public $name;

    public $pointsFor;

    public $pointsAgainst;

    public $record;

    public $rankings;

    public $standing;

    static function dtomap($data)
    {
        $obj = new StandingDto();
        $obj->id = $data->id;
        $obj->name = $data->name;
        $obj->pointsFor = $data->pointsFor;
        $obj->pointsAgainst = $data->pointsAgainst;
        $obj->record = RecordDto::dtomap($data->record);
        $obj->rankings = RankingDto::dtomap($data->rankings);
        $obj->standing = $data->standing;
        return $obj;
    }

}