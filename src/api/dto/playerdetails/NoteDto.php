<?php

namespace Fantasy\NFL\API\DTO\PlayerDetails;

use Fantasy\NFL\Resources\MapsDto;

class NoteDto extends MapsDto
{

    public $id;

    public $timestamp;

    public $source;

    public $headline;

    public $body;

    public $analysis;

    public static function dtomap($data)
    {
        $obj = new NoteDto();
        $obj->id = $data->id;
        $obj->timestamp = $data->timestamp;
        $obj->source = $data->source;
        $obj->headline = $data->headline;
        $obj->body = $data->body;
        $obj->analysis = $data->analysis;
        return $obj;
    }

}