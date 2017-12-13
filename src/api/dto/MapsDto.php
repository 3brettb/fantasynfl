<?php

namespace Fantasy\NFL\API\DTO;

abstract class MapsDto
{

    abstract static function dtomap($data);

    protected static function mapArray(array $items, $dto_class)
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