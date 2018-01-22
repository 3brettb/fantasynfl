<?php

namespace Fantasy\NFL\Fantasy\DTO\Standings;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class StandingDto extends ObjectMapsDto
{

    public $id;

    public $name;

    public $pointsFor;

    public $pointsAgainst;

    public $record;

    public $rankings;

    public $standing;

    static function mapObject($data)
    {
        $obj = new StandingDto();
        $obj->id = $data->id;
        $obj->name = $data->name;
        $obj->pointsFor = $data->pointsFor;
        $obj->pointsAgainst = $data->pointsAgainst;
        $obj->record = RecordDto::map($data->record);
        $obj->rankings = RankingDto::map($data->rankings);
        $obj->standing = $data->standing;
        return $obj;
    }

}