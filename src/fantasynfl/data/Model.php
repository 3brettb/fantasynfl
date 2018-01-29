<?php

namespace Fantasy\NFL\FantasyNFL\Data;

use Fantasy\NFL\FantasyNFL\Common\MapProperty;

class Model
{

    /**
     * Laravel Model reference
     */
    protected $reference = null;

    /**
     * Properties to map
     */
    protected $properties = [];

    /**
     * Can this model be represented as JSON
     */
    protected $canHandleJson = false;

    /**
     * Model constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->map($data);
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
            $property->map($this, $data, $this->canHandleJson);
        }

        // If mapping a model reference, save the reference
        if(isset($this->model) && get_class($data) == $this->reference)
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
                $b = $property[1];
                $c = (isset($property[2]) ? $property[2] : null);
                array_push($properties, new MapProperty($a, $b, $c));
            }
            else
            {
                array_push($properties, new MapProperty($property));
            }
        }
        return $properties;
    }

}