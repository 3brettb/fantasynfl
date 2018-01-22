<?php

namespace Fantasy\NFL\Fantasy\DTO\League;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class PlayerDto extends ObjectMapsDto
{

    public $id;

    public $esbid;

    public $gsisPlayerId;

    public $first;

    public $last;

    public $fullname;

    public $teamAbbr;

    public $position;

    static function mapObject($data)
    {
        $obj = new PlayerDto();
        $obj->id = $data->id;
        $obj->esbid = $data->esbid;
        $obj->gsisPlayerId = $data->gsisPlayerId;
        $obj->first = (isset($data->firstName)) ? $data->firstName : 999;
        $obj->last = (isset($data->lastName)) ? $data->lastName : 999;
        $obj->fullname = (isset($data->name)) ? $data->name : 999;
        $obj->teamAbbr = $data->teamAbbr;
        $obj->position = $data->position;
        self::normalize_player_name($obj);
        return $obj;
    }

    private static function normalize_player_name(&$obj)
    {
        if($obj->fullname == 999)
        {
            $obj->fullname = $obj->first.' '.$obj->last;
        }
        else
        {
            if($obj->first == 999 || $obj->last == 999)
            {
                $names = explode(" ", $obj->fullname);
                $obj->first = array_shift($names);
                $obj->last = implode(" ", $names);
            }
        }
    }

}