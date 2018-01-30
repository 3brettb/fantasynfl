<?php

namespace Fantasy\NFL\FantasyNFL\Data\League\Models;

use Fantasy\NFL\FantasyNFL\Data\Model;

class League extends Model
{
    public $id;

    public $name;

    /**
     * @var string Laravel Models Reference
     */
    protected $reference = \Fantasy\NFL\FantasyNFL\Models\League::class;

    public $model;

    /**
     * @var array Properties to map
     */
    public $properties = [
        'id',
        'name'
    ];

}