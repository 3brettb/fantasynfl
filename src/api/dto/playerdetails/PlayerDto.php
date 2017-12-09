<?php

namespace Fantasy\NFL\API\DTO\PlayerDetails;

use Fantasy\NFL\API\DTO\MapsDto;

class PlayerDto implements MapsDto
{

    public $id;

    public $esbid;

    public $gsisPlayerId;

    public $name;

    public $teamAbbr;

    public $status;

    public $injuryGameStatus;

    public $jerseyNumber;

    public $notes;

    public $videos;

    public $weeks;

    public static function dtomap($data)
    {
        $obj = new PlayerDto();
        $obj->id = $data->id;
        $obj->esbid = $data->esbid;
        $obj->gsisPlayerId = $data->gsisPlayerId;
        $obj->name = $data->name;
        $obj->teamAbbr = $data->teamAbbr;
        $obj->status = $data->status;
        $obj->injuryGameStatus = $data->injuryGameStatus;
        $obj->jerseyNumber = $data->jerseyNumber;
        $obj->notes = self::mapNotes($data->notes);
        $obj->videos = self::mapVideos($data->videos);
        $obj->weeks = self::mapWeeks($data->weeks);
        return $obj;
    }

    private static function mapNotes($data)
    {
        $out = array();
        foreach($data as $item)
        {
            array_push($out, NoteDto::dtomap($item));
        }
        return $out;
    }

    private static function mapVideos($data)
    {
        $out = array();
        foreach($data as $item)
        {
            array_push($out, VideoDto::dtomap($item));
        }
        return $out;
    }

    private static function mapWeeks($data)
    {
        $out = array();
        foreach($data as $item)
        {
            array_push($out, WeekDto::dtomap($item));
        }
        return $out;
    }

}