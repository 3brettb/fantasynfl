<?php

namespace Fantasy\NFL\API\DTO\PlayerDetails;

use Fantasy\NFL\Resources\Maps\ObjectMapsDto;

class PlayerDto extends ObjectMapsDto
{

    public $id;

    public $esbid;

    public $gsisPlayerId;

    public $name;

    public $position;

    public $teamAbbr;

    public $status;

    public $injuryGameStatus;

    public $jerseyNumber;

    public $notes;

    public $videos;

    public $weeks;

    public static function mapObject($data)
    {
        $obj = new PlayerDto();
        $obj->id = $data->id;
        $obj->esbid = $data->esbid;
        $obj->gsisPlayerId = $data->gsisPlayerId;
        $obj->name = $data->name;
        $obj->position = $data->position;
        $obj->teamAbbr = $data->teamAbbr;
        $obj->status = $data->status;
        $obj->injuryGameStatus = $data->injuryGameStatus;
        $obj->jerseyNumber = $data->jerseyNumber;
        $obj->notes = parent::mapArray($data->notes, NoteDto::class);
        $obj->videos = parent::mapArray($data->videos, VideoDto::class);
        $obj->weeks = parent::mapArray($data->weeks, WeekDto::class);
        return $obj;
    }

}