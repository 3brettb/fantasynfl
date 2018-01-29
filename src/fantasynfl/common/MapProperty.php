<?php

namespace Fantasy\NFL\FantasyNFL\Common;

class MapProperty
{

    private $property;

    private $mappedTo;

    private $mapToClass;

    public function __construct($property, $mappedTo = null, $mapToClass = null)
    {
        $this->property = $property;
        $this->mappedTo = ($mappedTo != null) ? $mappedTo : $property;
        $this->mapToClass = $mapToClass;
    }

    public function map(&$model, $data, $asJson)
    {
        self::handleJson($data, $asJson);

        $p = $this->property;
        $m = $this->mappedTo;

        if($this->mapToClass == null) {
            $model->$p = $data->$m;
        } else {
            $model->$p = new $this->mapToClass($data->$m);
        }
    }

    private function handleJson(&$data, $asJson)
    {
        if($asJson && !is_object($data))
        {
            // translate to json only if:
            // - the model can handle json ($asJson)
            // - the data is not already an object (!is_object($data))
            // - the data is a string (handled on JsonObject construction
            // If there is an error decoding json, JsonObject is {}
            $data = new JsonObject($data);
        }
    }

}