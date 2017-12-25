<?php

namespace Fantasy\NFL\API\DTO\ScoringLeaders;

use Fantasy\NFL\Resources\MapsDto;

class KickingStatsDto extends MapsDto
{

    public $Pat;

    public $Fg19;

    public $Fg29;

    public $Fg39;

    public $Fg49;

    public $Fg50;

    static function dtomap($data)
    {
        $obj = new KickingStatsDto();
        $obj->Pat = $data->Pat;
        $obj->Fg19 = $data->Fg19;
        $obj->Fg29 = $data->Fg29;
        $obj->Fg39 = $data->Fg39;
        $obj->Fg49 = $data->Fg49;
        $obj->Fg50 = $data->Fg50;
        return $obj;
    }

}