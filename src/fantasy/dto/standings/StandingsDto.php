<?php

namespace Fantasy\NFL\Fantasy\DTO\Standings;

use Fantasy\NFL\API\DTO\MapsDto;

class StandingsDto extends MapsDto
{

    public $leagueId;

    public $weekId;

    public $count;

    public $standings;

    public $lastUpdated;

    public $type;

    static function dtomap($data)
    {
        $obj = new StandingsDto();
        $obj->leagueId = $data->leagueId;
        $obj->weekId = $data->weekId;
        $obj->count = $data->count;
        $obj->standings = self::mapArray($data->standings, StandingDto::class);
        $obj->lastUpdated = $data->lastUpdated;
        $obj->type = $data->type;
        return $obj;
    }

    public function team($id)
    {
        foreach($this->teams as $team)
        {
            if($team->id == $id) return $team;
        }
        return null;
    }

}