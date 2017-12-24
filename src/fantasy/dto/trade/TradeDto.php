<?php

namespace Fantasy\NFL\Fantasy\DTO\Trade;

use Fantasy\NFL\API\DTO\MapsDto;

class TradeDto extends MapsDto
{

    public $id;

    public $status;

    public $ttl;

    public $lastUpdated;

    public $name;

    public $description;

    public $accepted;

    public $rejected;

    public $acceptedByTeams;

    public $approvedByLeague;

    public $approvedByManagement;

    public $teams;

    public $players;

    public $picks;

    public $actions;

    public $revisions;

    public $notes;

    public $model;

    static function dtomap($data)
    {
        $json = $data->data;

        $obj = new TradeDto();
        $obj->id = $data->id;
        $obj->status = $data->status;
        $obj->ttl = $data->ttl;
        $obj->lastUpdated = $json->lastUpdated;
        $obj->name = $json->name;
        $obj->description = $json->description;
        $obj->accepted = $json->accepted;
        $obj->rejected = $json->rejected;
        $obj->acceptedByTeams = $json->acceptedByTeams;
        $obj->approvedByLeague = $json->approvedByLeague;
        $obj->approvedByManagement = $json->approvedByManagement;
        $obj->teams = $json->teams;
        $obj->players= $json->players;
        $obj->picks = $json->picks;
        $obj->actions = self::mapArray($json->actions, TradeActionDto::class);
        $obj->revisions = self::mapArray($json->revisions, RevisionDto::class);
        $obj->notes = self::mapArray($json->notes, TradeNoteDto::class);
        $obj->model = $data;
        return $obj;
    }

}