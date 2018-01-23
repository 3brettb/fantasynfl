<?php

namespace Fantasy\NFL\Fantasy\DTO\Team;

use Fantasy\NFL\Resources\Maps\ClassMapsDto;

class LineupPlayerDto extends ClassMapsDto
{

    public $id;

    public $esbid;

    public $gsisPlayerId;

    public $injuryGameStatus;

    public $jerseyNumber;

    public $name;

    public $position;

    public $status;

    public $teamAbbr;

    public $projected;

    public $score;

    public $type;

    public $place;

    public $notes;

    public $videos;

    public $weeks;

    /**
     * @param LineupPlayerData $class
     * @return LineupPlayerDto
     */
    static function mapClass($class)
    {
        $obj = new LineupPlayerDto();

        // Player Details
        $obj->id = $class->id;
        $obj->esbid = $class->esbid;
        $obj->gsisPlayerId = $class->gsisPlayerId;
        $obj->injuryGameStatus = $class->injuryGameStatus;
        $obj->jerseyNumber = $class->jerseyNumber;
        $obj->name = $class->name;
        $obj->position = $class->position;
        $obj->status = $class->status;
        $obj->teamAbbr = $class->teamAbbr;
        $obj->notes = $class->notes;
        $obj->videos = $class->videos;
        $obj->weeks = $class->weeks;

        // Lineup Data
        $obj->projected = $class->projected;
        $obj->score = $class->score;
        $obj->type = $class->type;
        $obj->place = $class->place;
        return $obj;
    }

}