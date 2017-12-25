<?php

namespace Fantasy\NFL\API\DTO\News;

use Fantasy\NFL\Resources\MapsDto;

class NewsItemDto extends MapsDto
{

    public $id;

    public $esbid;

    public $gsisPlayerId;

    public $firstName;

    public $lastName;

    public $position;

    public $teamAbbr;

    public $timestamp;

    public $source;

    public $headline;

    public $body;

    public $analysis;

    public static function dtomap($data)
    {
        $obj = new NewsItemDto();
        $obj->id = $data->id;
        $obj->esbid = $data->esbid;
        $obj->gsisPlayerId = $data->gsisPlayerId;
        $obj->firstName = $data->firstName;
        $obj->lastName = $data->lastName;
        $obj->position = $data->position;
        $obj->teamAbbr = $data->teamAbbr;
        $obj->timestamp = $data->timestamp;
        $obj->source = $data->source;
        $obj->headline = $data->headline;
        $obj->body = $data->body;
        $obj->analysis = $data->analysis;
        return $obj;
    }

}