<?php

namespace Fantasy\NFL\FantasyNFL\Data\Activity\Models;

use Fantasy\NFL\FantasyNFL\Data\Model;

class Involved extends Model
{
    public $id;

    public $type;

    /**
     * @var array Properties to map
     */
    public $properties = [
        'id',
        'type'
    ];

    protected static $canHandleJson = true;

    /**
     * Retrieve reference model
     * @return mixed
     */
    public function get()
    {
        return $this->type::find($this->id);
    }

}