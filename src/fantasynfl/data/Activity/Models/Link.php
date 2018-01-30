<?php

namespace Fantasy\NFL\FantasyNFL\Data\Activity\Models;

use Fantasy\NFL\FantasyNFL\Data\Model;

class Link extends Model
{
    public $name;

    public $src;

    /**
     * @var array Properties to map
     */
    public $properties = [
        'name',
        'src'
    ];

    protected static $canHandleJson = true;

    public function a()
    {
        return "<a href='".$this->src."'>".$this->name."</a>";
    }

}