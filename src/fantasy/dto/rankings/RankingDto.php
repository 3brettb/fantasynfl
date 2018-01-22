<?php

namespace Fantasy\NFL\Fantasy\DTO\Rankings;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class RankingDto extends ObjectMapsDto
{

    public $id;

    public $rank;

    public $last;

    public $change;

    public $record;

    public $notes;

    static function mapObject($data)
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