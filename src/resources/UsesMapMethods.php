<?php

namespace Fantasy\NFL\Resources;

trait UsesMapMethods
{

    // TODO: Update this method to use `array $items` and update all method calls to use $items->toArray() ???
    protected static function mapArray($items, $dto_class)
    {
        $out = array();
        foreach($items as $item)
        {
            array_push($out, $dto_class::dtomap($item));
        }
        return $out;
    }

    protected static function mapKeyValue($items, $dto_class)
    {
        $out = array();
        foreach($items as $key => $value)
        {
            array_push($out, new $dto_class($key, $value));
        }
        return $out;
    }

    protected static function mapWithVars($data, $vars, $dto_class)
    {
        $data->dto_vars = $vars;
        return $dto_class::dtomap($data);
    }

}