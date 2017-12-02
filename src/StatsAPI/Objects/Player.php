<?php

namespace Fantasy\NFL\StatsAPI\Objects;

class Player
{

    public $id;

    public $esbid;

    public $gsisPlayerId;

    public $name;

    public $firstname;

    public $lastname;

    public $position;

    public $teamAbbr;

    public $status;

    public $injuryGameStatus;

    public $jerseyNumber;

    public $notes = [];

    public $videos = [];

    public $weeks = [];

    public $stats = [];

}