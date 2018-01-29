<?php

namespace Fantasy\NFL\FantasyNFL\Data\League\Models;

use Fantasy\NFL\FantasyNFL\Data\Model;

class League extends Model
{
    public $id;

    public $name;

    public $model;

    /**
     * @var string Laravel Model Reference
     */
    public $reference = \Fantasy\NFL\Fantasy\Models\League::class;

    /**
     * @var array Properties to map
     */
    public $properties = [
        'id',
        'name'
    ];

}