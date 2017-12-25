<?php

namespace Fantasy\NFL\Fantasy\DTO\Season;

use Fantasy\NFL\Resources\MapsDto;

class PostseasonGameResultDto extends MapsDto
{

    public $winner;

    public $home;

    public $away;

    public $desc;

    static function dtomap($data)
    {
        $obj = new PostseasonGameResultDto();
        $obj->winner = $data->winner;
        $obj->home = $data->home;
        $obj->away = $data->away;
        $obj->desc = $data->desc;
        return $obj;
    }

}