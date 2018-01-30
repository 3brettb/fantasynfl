<?php

namespace Fantasy\NFL\FantasyNFL\Data;

use Fantasy\NFL\FantasyNFL\Common\MapProperty;

class Model
{

    /**
     * Laravel Models reference
     */
    protected $reference = null;

    /**
     * Properties to map
     */
    protected $properties = [];

    /**
     * Can this model be represented as JSON
     */
    protected static $canHandleJson = false;

    /**
     * Model constructor.
     * Private so you can only use create()
     */
    private function __construct(){}

    /**
     * Static constructor
     * @param $data
     * @return mixed
     */
    public static function create($data)
    {
        $obj = new static();
        return (is_object($data)) ? $obj->map($data) : null;
    }

    /**
     * @param $data
     * @return $this
     */
    public function map($data)
    {
        $properties = $this->mapProperties();

        // Map each of the specified properties
        foreach($properties as $property)
        {
            $property->map($this, $data);
        }

        // If mapping a model reference, save the reference
        if(get_class($data) == $this->reference)
        {
            $this->model = $data;
        }
        return $this;
    }

    /**
     * @return MapProperty[]
     */
    private function mapProperties()
    {
        $properties = array();
        foreach($this->properties as $property)
        {
            if(is_array($property))
            {
                $a = $property[0];
                $b = isset($property[1]) ? $property[1] : null;
                $c = isset($property[2]);
                array_push($properties, new MapProperty($a, $b, $c));
            }
            else
            {
                array_push($properties, new MapProperty($property));
            }
        }
        return $properties;
    }

    /**
     * @return bool
     */
    public static function handlesJson()
    {
        return static::$canHandleJson;
    }

    /**
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        return (isset($this->$name)) ? $name : null;
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

}