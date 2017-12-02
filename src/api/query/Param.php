<?php

namespace Fantasy\NFL\API\Query;

class Param
{

    public $name;

    public $default;

    public $value;

    public $required;

    public $options;

    public function __construct($name, $default = null, $value = null, $required = false, $options = [])
    {
        $this->name = $name;
        $this->default = $default;
        $this->value = $value;
        $this->required = $required;
        $this->options = $options;
    }

    public function validOption($option)
    {
        if(sizeof($this->options) != 0) return in_array($option, $this->options);
        return true;
    }

    public function set($value)
    {
        $this->value = $value;
        return $this;
    }

    public function getKeyValue()
    {
        return [$this->name => $this->value];
    }

}