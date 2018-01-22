<?php

namespace Fantasy\NFL\Fantasy\DTO\Season;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class PostseasonGameResultDto extends ObjectMapsDto
{

    public $winner;

    public $home;

    public $away;

    public $desc;

    static function mapObject($data)
    {
        $obj = new PostseasonGameResultDto();
        $obj->winner = $data->winner;
        $obj->home = $data->home;
        $obj->away = $data->away;
        $obj->desc = $data->desc;
        return $obj;
    }

}