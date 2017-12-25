<?php

namespace Fantasy\NFL\Fantasy\DTO\Trade;

use Fantasy\NFL\Resources\MapsDto;

class RevisionDto extends MapsDto
{

    public $lastUpdated;

    public $issued;

    public $issuedBy;

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

    static function dtomap($data)
    {
        $obj = new RevisionDto();
        $obj->lastUpdated = $data->lastUpdated;
        $obj->issued = $data->issued;
        $obj->issuedBy = $data->issuedBy;
        $obj->accepted = $data->accepted;
        $obj->rejected = $data->rejected;
        $obj->teams = $data->teams;
        $obj->players= $data->players;
        $obj->picks = $data->picks;
        $obj->actions = self::mapArray($data->actions, TradeActionDto::class);
        $obj->notes = self::mapArray($data->notes, TradeNoteDto::class);
        return $obj;
    }

}