<?php

namespace Fantasy\NFL\Fantasy\DTO\Rankings;

use Fantasy\NFL\Resources\MapsDto;

class RankingDto extends MapsDto
{

    public $id;

    public $rank;

    public $last;

    public $change;

    public $record;

    public $notes;

    static function dtomap($data)
    {
        $obj = new RankingDto();
        $obj->id = $data->id;
        $obj->rank = $data->rank;
        $obj->last = $data->last;
        $obj->change = $data->change;
        $obj->record = $data->record;
        $obj->notes = $data->notes;
        return $obj;
    }

}