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
        try {
            return self::jsonmap($data);
        } catch(\ErrorException $e) {
            return null;
        }
    }

    static function jsonmap($data)
    {
        $obj = new PostseasonGameResultDto();
        $obj->winner = $data->winner;
        $obj->home = $data->home;
        $obj->away = $data->away;
        $obj->desc = $data->desc;
        return $obj;
    }

}