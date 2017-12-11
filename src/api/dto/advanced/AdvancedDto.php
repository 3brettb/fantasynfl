<?php

namespace Fantasy\NFL\API\DTO\Advanced;

use Fantasy\NFL\API\DTO\MapsDto;

class AdvancedDto extends MapsDto
{

    static function dtomap($data)
    {
        $obj = new AdvancedDto();
        dd($data);
        return $obj;
    }

}