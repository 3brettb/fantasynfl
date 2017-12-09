<?php

namespace Fantasy\NFL\API\DTO\PlayerDetails;

class StatDto
{

    public $key;

    public $value;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

}