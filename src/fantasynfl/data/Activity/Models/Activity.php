<?php

namespace Fantasy\NFL\FantasyNFL\Data\Activity\Models;

use Fantasy\NFL\FantasyNFL\Data\Model;

class Activity extends Model
{
    public $id;

    public $type;

    public $time;

    public $heading;

    public $content;

    public $involved;

    public $links;

    /**
     * @var string Laravel Models Reference
     */
    protected $reference = \Fantasy\NFL\FantasyNFL\Models\Activity::class;

    public $model;

    /**
     * @var array Properties to map
     */
    public $properties = [
        'id',
        'type',
        'name',
        'time',
        'heading',
        'content',
        ['involved', Involved::class, 'multiple'],
        ['links', Link::class, 'multiple']
    ];

}