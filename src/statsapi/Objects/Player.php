<?php

namespace Fantasy\NFL\StatsAPI\Objects;

use Fantasy\NFL\Resources\Object;
use Illuminate\Database\Eloquent\Model;

class Player extends Object
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

    static  function mapModel(Model $model)
    {
        // TODO: Implement mapModel() method.
        return new Player();
    }

}